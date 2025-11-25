<?php

namespace App\Http\Controllers;
use App\Services\ServiceItemService;
use App\Models\ServiceItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function ServiceCreate(Request $request){
          
    $validated= $request->validate(
        [
            //required
     "category_id" => "nullable|integer|exists:categories,id",
        "categoryName"=>"required|string",
        "itemType"=>"required|string",
        "itemAge"=>"required|string",  // in years
        "itemCondition"=>"required|in:new,moderate,old",
        "serviceType"=>"required|string",
     
        //required_if
       
        "isCustomSubCategory"=>"boolean",
        "customSubcategoryName"=>"required_if:isCustomSubCategory,1|string|nullable",
        "isCustomServiceType"=>"boolean",
        "customServiceTypeName"=>"required_if:isCustomServiceType,1|string|nullable",
        "alertType"=>"required|in:time,usage,both,custom",
        //required if alert or both
        "timeThresold"=>"required_if:alertType,time,both|integer|nullable",
        "lastServicedate"=>"required_if:alertType,time,both|date|nullable",
        "daysSpecific"=>"nullable|integer",
        
        // "time_based_next_date", system calculate
        
        "UsageUnit"=>"required_if:alertType,usage,both|string|nullable",
        "UsageThresold"=>"required_if:alertType,usage,both|integer|nullable",
        "CurrentUsage"=>"required_if:alertType,usage,both|integer|nullable",
        "AvgDailyUsage"=>"required_if:alertType,usage,both|integer|nullable",

        // "Usage_based_next_date", system calculate    
        "customAlertDate"=>"required_if:alertType,custom|date|nullable",

        "WarrantyPeriod"=>"nullable|integer",
        "WarrantyStartDate"=>"nullable|date",
        "WarrantyAlert"=>"boolean",
        "WarrantyAlertDaysBefore"=>"nullable|integer",
        "WarrantyEndDate",

        "AlertStatus"=>"in:active,paused,completed",
        "serviceHistory"=>"array|nullable",
        // "finalAlertDate" system calculate
        ]
        );
    $data=$validated;
    $data["user_id"]=Auth::id();

    $AlertService=new  ServiceItemService();
    $finalAlertDate=$AlertService->Alertlogic($data);
    $WarrantyEndDate=$AlertService->WarratyAlerAccess($data);

    $data["finalAlertDate"]=$finalAlertDate;
    

    $data["WarrantyEndDate"]=$WarrantyEndDate;
    $serviceItem=ServiceItem::create($data);
    return response()->json([
        "message"=>"Service Item Created successfully",
         "service"=>$serviceItem
    ],201);        
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
 $servicedel=ServiceItem::destroy($id);
 return response()->json([
    "message"=>"Service deleted successfully",
    "ServiceItem"=>$servicedel
 ]);
}
}
