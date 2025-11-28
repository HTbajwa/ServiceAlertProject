<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyUsage extends Model
{
    
protected $fillable = [
    "user_id",
    "service_item_id",
    "usage",
    "date"
];

}
