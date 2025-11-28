<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicetype extends Model
{
    //
    protected $fillable = [
        "subcategory_id",
        "service_type"
    ];
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
