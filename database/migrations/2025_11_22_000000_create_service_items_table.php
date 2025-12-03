<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("category_id")->nullable()->constrained()->onDelete("cascade");
            $table->foreignId("subcategory_id")->nullable()->constrained('subcategories')->onDelete("cascade");
            $table->foreignId("service_type_id")->nullable()->constrained('service_types')->onDelete("cascade");
            $table->string("categoryName")->nullable();
            $table->string("itemType")->nullable();
            $table->string("itemAge"); //in years
            $table->enum("itemCondition", ["new", "moderate", "old"]);
            $table->string("serviceType")->nullable();
            //for custom SubCategory Name
            $table->boolean("isCustomSubCategory")->nullable()->default(false);
            $table->string("customSubcategoryName")->nullable();
            //for custom service Type Name
            $table->boolean("isCustomServiceType")->nullable()->default(false);
            $table->string("customServiceTypeName")->nullable();
            //Alert Type
            $table->enum("alertType", ["time", "usage", "both", "custom"]);
            //for Time based
            $table->string("timeThresold")->nullable();
            $table->date("lastServicedate")->nullable();
            $table->integer("daysSpecific")->nullable();   //before or after 10,2 days
            $table->date("time_based_next_date")->nullable(); //calculation store here
                                                            //Manual OverRide
            //for Usage based
            $table->string("UsageUnit")->nullable();
            $table->string("UsageThresold")->nullable();
            $table->string("CurrentUsage")->nullable();
            $table->string("AvgDailyUsage")->nullable();
            $table->string("Usage_based_next_date")->nullable();    //calculation of usage store 
            //for Custom
            $table->date("customAlertDate")->nullable();
            //for Warranty Alert
            $table->integer("WarrantyPeriod")->nullable();
            $table->date("WarrantyStartDate")->nullable();
            $table->boolean("WarrantyAlert")->nullable()->default(false);  //toggle yes or no
            $table->date("WarrantyEndDate")->nullable();     // calculated by system
            $table->integer("WarrantyAlertDaysBefore")->nullable();
            //final date
            $table->date("finalAlertDate")->nullable(); //calculated by system
            //Alert Tracking
            $table->enum("AlertStatus", ["active", "paused", "completed"])->default("active");
            //History
            $table->json("serviceHistory")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_items');
    }
};
