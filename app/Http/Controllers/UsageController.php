<?php

namespace App\Http\Controllers;

use App\Models\DailyUsage;
use App\Models\ServiceItem;
use App\Services\ServiceItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsageController extends Controller
{
    // public function dailyUpdateUsage(Request $request)
    // {

    //     $validation = Validator::make($request->all(), [
    //         'service_id' => "required|exists:service_items,id",
    //         'usage' => 'required|numeric|min:0'
    //     ]);
    //     if ($validation->fails()) {
    //         return response()->json(
    //             [
    //                 "error" => $validation->errors()

    //             ],
    //             422
    //         );
    //     }
    //     $usage = $validation->validated();

    //     $usage = DailyUsage::updateOrCreate(
    //         [
    //             'user_id' => Auth::id(),
    //             'service_item_id' => $request->service_id,
    //             "date" => now()->toDateString()
    //         ],
    //         ['usage' => $request->usage]
    //     );

    //     return response()->json([
    //         "message" => "Daily usage updated successfully",
    //         "usage" => $usage
    //     ]);
    // }
    public function dailyUpdateUsage(Request $request)
{
    $request->validate([
        "service_item_id" => "required|exists:service_items,id",
        "usage" => "required|integer|min:0",
    ]);

    $serviceId = $request->service_item_id;
    $userId = Auth::id();
    $usage = $request->usage;

   
    $dailyUsageRecord = DailyUsage::updateOrCreate(
        ["service_item_id" => $serviceId, "user_id" => $userId, "date" => now()->toDateString()],
        ["usage" => $usage]
    );

   
    $serviceItem = ServiceItem::find($serviceId);



   
    $alertService = new ServiceItemService();

    
    $newAlertDate = $alertService->Alertlogic([
        "alertType" => $serviceItem->alertType,
        "AvgDailyUsage" => $serviceItem->AvgDailyUsage,
        "CurrentUsage" => $serviceItem->CurrentUsage,
        "UsageThresold" => $serviceItem->UsageThresold,
        "timeThresold"=>$serviceItem->timeThresold,
        "user_id" => $serviceItem->user_id,
        "service_item_id" => $serviceItem->id,
        "itemAge" => $serviceItem->itemAge,
        "itemCondition" => $serviceItem->itemCondition,
        "lastServicedate" => $serviceItem->lastServicedate,
        "daysSpecific" => $serviceItem->daysSpecific,
    ]);

   
    $serviceItem->finalAlertDate = $newAlertDate;
    $serviceItem->save();

   
    return response()->json([
        "message" => "Daily usage updated successfully",
        "usage" => $dailyUsageRecord,
        "newAlertDate" => $newAlertDate
    ]);
}

}
