<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\DailyUsage;
use function Symfony\Component\Clock\now;

class ServiceItemService
{

  public function Alertlogic(array $data)
  {

    $alertType = $data["alertType"];
    $itemCondition = $data["itemCondition"] ?? "new";
    $AgeFactors = $data["itemAge"] ?? 0;


    $ConditionFactor = $this->getCondition($itemCondition);
    $AgedFactor = $this->AgeFactor($AgeFactors);

    switch ($alertType) {
      case 'time':
        return $this->timebaseAlert(
          $data["timeThresold"],    //30
          $data["lastServicedate"], //1-11-25
          $data["daysSpecific"] ?? 0, //2
          $AgedFactor, //2 ->0.9
          $ConditionFactor, //moderate  //0.8
        );
        break;
      case 'usage':
        return $this->UsagebaseAlert(
          $data["AvgDailyUsage"],
          $data["CurrentUsage"],
          $AgedFactor,
          $ConditionFactor,
          $data["UsageThresold"],
          $data["user_id"], //user id
          $data["service_item_id"] //service id
        );
        break;
      case 'both':
        $timebase = $this->timebaseAlert(
          $data["timeThresold"],
          $data["lastServicedate"],
          $data["daysSpecific"] ?? 0,
          $AgedFactor,
          $ConditionFactor,
        );
        $usagebase = $this->UsagebaseAlert(
          $data["AvgDailyUsage"],
          $data["CurrentUsage"],
          $AgedFactor,
          $ConditionFactor,
          $data["UsageThresold"],
          $data["user_id"], //user id
          $data["service_item_id"] //service id
        );
        return min($timebase, $usagebase);
        break;
      case 'custom':
        return $this->CustomAlert($data["customAlertDate"]);
        break;

      default:
        return null;
        break;
    }
  }

  public function WarratyAlerAccess(array $data)
  {
    if (!empty($data["WarrantyAlert"]) && $data["WarrantyAlert"] == true) {
      return $this->WarrantyAlert(
        $data["WarrantyStartDate"],
        $data["WarrantyPeriod"],
        $data["WarrantyAlertDaysBefore"]
      );
    }
  }



  private function getCondition($condition)
  {
    return match ($condition) {
      "new" => 1.0,
      "moderate" => 0.8,   //0.8
      "old" => 0.6,
      default => 1.0
    };
  }

  private function AgeFactor($age)
  {
    $factor = 1 - ($age * 0.05);            //3        1-(3-0.05)=0.85
    return max($factor, 0.05); //should not below 50%
  }

  private function timebaseAlert($timeThresold, $lastServicedate, $daysSpecific = 0, $AgeFactor, $conditionFactor)
  {
    // 30 * 0.8 * 0.9 = 21.6
    //40*0.8*0.85=27.2

    $adjustedTimeThreshold = $timeThresold * $conditionFactor * $AgeFactor;

    if (!empty($lastServicedate)) { //1-10-2025
      $last = Carbon::parse($lastServicedate);
      $newdate = $last->copy()->addDays(ceil($adjustedTimeThreshold)); // ceil to avoid fractions //29
    } else {
      $newdate = Carbon::now()->addDays(ceil($adjustedTimeThreshold));  //29-3=26
    }

    if ($daysSpecific != 0) {
      $newdate = $newdate->copy()->subDays($daysSpecific);
    }

    return $newdate;
  }

  //currentusage na ho agr

 private function UsagebaseAlert($avgDailyUsage, $currentUsage, $AgeFactor, $conditionFactor, $usageThresold, $userId, $serviceId)
{
    $adjustedUsageThreshold = $usageThresold * $conditionFactor * $AgeFactor;
//120*0.8*0.9=86.4
    // Include total usage from DB + initial currentUsage
    $totalUsage = DailyUsage::where('user_id', $userId)
                            ->where('service_item_id', $serviceId)
                            ->sum('usage');
                            //12
      
    $allUsage=$totalUsage;
//12
    $remainingUsage = $adjustedUsageThreshold;
    $remainingUsage-=$allUsage;
//12-86.4
    if ($remainingUsage <= 0) {
        return now(); // threshold already reached
    }

    // Days left based on avg daily usage
    $daysLeft = $remainingUsage / max($avgDailyUsage, 1);

    return Carbon::now()->addDays(ceil($daysLeft));
}

  private function CustomAlert($customdate)
  {
    return Carbon::parse($customdate);
  }

  private function WarrantyAlert($warrantyStartDate, $warrantyPeriod, $daysBefore = 0)
  {

    $startdate = Carbon::parse($warrantyStartDate);
    $warrantyEnd = $startdate->copy()->addYears($warrantyPeriod);
    if ($daysBefore > 0) {
      $warrantyEnd->subDays($daysBefore);
    }
    return $warrantyEnd;

    // $warrantyEndDate = $warrantyStartDate + $warrantyPeriod		;				
    // 1 jan 2025+24months=1jan 2027				
    // $warrantyAlertDate = $warrantyEndDate - $warrantyAlertDaysBefore;
    // return $warrantyAlertDate;					
    // 1/1/2027-15=17 dec 2026				
    // If today >= warrantyAlertDate → send alert.			
  }
}
