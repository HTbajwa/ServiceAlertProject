<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model
{
    //29 fields
    protected $fillable = [
        "user_id", 
        "category_id",
        "categoryName",
        "itemType",
        "itemAge",
        "itemCondition",
        "serviceType",
        "isCustomSubCategory",
        "customSubcategoryName",
        "isCustomServiceType",
        "customServiceTypeName",
        "alertType",
        "timeThresold",
        "lastServicedate",
        "daysSpecific",             //like how many days befre you want alert
        "time_based_next_date",
        "custom_alert_date",
        "UsageUnit",
        "UsageThresold",
        "CurrentUsage",
        "AvgDailyUsage",
        "Usage_based_next_date",
        "customAlertDays",
        "customAlertDate",
        "WarrantyPeriod",
        "WarrantyStartDate",
        "WarrantyAlert",
        "WarrantyAlertDaysBefore",
        "WarrantyEndDate",
        "AlertStatus",
        "serviceHistory",
        "finalAlertDate",

    ];
    protected $casts = [
        "serviceHistory"=>'array'
    ];
}
