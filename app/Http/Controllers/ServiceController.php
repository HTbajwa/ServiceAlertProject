<?php

namespace App\Http\Controllers;

use App\Services\ServiceItemService;
use App\Models\ServiceItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class ServiceController extends Controller
{
   public function ServiceCreate(Request $request)
{
    $validated = Validator::make($request->all(), [
        "category_id" => "nullable|integer|exists:categories,id",
        "subcategory_id" => "nullable|integer|exists:categories,id",
        "service_type_id" => "nullable|integer|exists:categories,id",
        "categoryName" => "string",
        "itemType" => "string",
        "itemAge" => "required|string",
        "itemCondition" => "required|in:new,moderate,old",
        "serviceType" => "string",
        "isCustomSubCategory" => "boolean",
        "customSubcategoryName" => "required_if:isCustomSubCategory,1|string|nullable",
        "isCustomServiceType" => "boolean",
        "customServiceTypeName" => "required_if:isCustomServiceType,1|string|nullable",
        "alertType" => "required|in:time,usage,both,custom",
        "timeThresold" => "required_if:alertType,time,both|integer|nullable",
        "lastServicedate" => "required_if:alertType,time,both|date|nullable",
        "daysSpecific" => "nullable|integer",
        "UsageUnit" => "required_if:alertType,usage,both|string|nullable",
        "UsageThresold" => "required_if:alertType,usage,both|integer|nullable",
        "CurrentUsage" => "required_if:alertType,usage,both|integer|nullable",
        "AvgDailyUsage" => "required_if:alertType,usage,both|integer|nullable",
        "customAlertDate" => "required_if:alertType,custom|date|nullable",
        "WarrantyPeriod" => "nullable|integer",
        "WarrantyStartDate" => "nullable|date",
        "WarrantyAlert" => "boolean",
        "WarrantyAlertDaysBefore" => "nullable|integer",
        "WarrantyEndDate" => "nullable|date",
        "AlertStatus" => "in:active,paused,completed",
        "serviceHistory" => "array|nullable",
    ]);

    $validated->sometimes(['category_id','subcategory_id','service_type_id'],'required|string',function($input){
  return $input->isCustomSubCategory==0 || false;
    });
      $validated->sometimes(['categoryName','itemType'],'nullable',function($input){
  return $input->isCustomSubCategory==1;
    });

    if ($validated->fails()) {
        return response()->json([
            "error" => $validated->errors()
        ], 422);
    }

    $data1 = $validated->validated();
    $data1["user_id"] = Auth::id();

    // Create service item
    $serviceItem = ServiceItem::create($data1);

    // Add service_item_id for alert logic
    $data1["service_item_id"] = $serviceItem->id;

    $AlertService = new ServiceItemService();
    $finalAlertDate = $AlertService->Alertlogic($data1);
    $WarrantyEndDate = $AlertService->WarratyAlerAccess($data1);

    // Update the service item with calculated dates
    $serviceItem->update([
        "finalAlertDate" => $finalAlertDate,
        "WarrantyEndDate" => $WarrantyEndDate
    ]);

    // Return proper JSON response
    return response()->json([
        "message" => "Service item created successfully",
        "serviceItem" => $serviceItem,
        "finalAlertDate" => $finalAlertDate,
        "WarrantyEndDate" => $WarrantyEndDate
    ], 201);
}



    public function updateCategoryById(Request $request, $id)
    {
        $serviceRecord = ServiceItem::findOrFail($id);
        $user = Auth::user();

        $newStatus = $request->input('AlertStatus');

        if ($newStatus === 'completed' && $serviceRecord->AlertStatus !== 'completed') {


            $historyArray = $serviceRecord->serviceHistory ?? [];
            $newHistoryEntry = [
                'UserId' => $user->id,
                'completiondate' => now()->toDateTimeString(),
                'service_type' => $serviceRecord->serviceType,
                'notes' => 'Service completed based on alert cycle.',
            ];
            $historyArray[] = $newHistoryEntry;
            $serviceRecord->serviceHistory = $historyArray;

            if ($serviceRecord->alertType === 'time') {
                $serviceRecord->lastServicedate = now();
            }
        }


        $serviceRecord->AlertStatus = $newStatus;


        $serviceRecord->fill($request->except(['serviceHistory', 'AlertStatus']));


        $serviceRecord->save();

        return response()->json(['message' => 'Service record updated successfully'], 200);
    }

    public function getService($id)
    {
        return ServiceItem::find($id);
    }
    public function getAllServices()
    {
        return ServiceItem::all();
    }
    public function delServiceById($id)
    {
        $servicedel = ServiceItem::destroy($id);
        return response()->json([
            "message" => "Service deleted successfully",
            "ServiceItem" => $servicedel
        ]);
    }
}
