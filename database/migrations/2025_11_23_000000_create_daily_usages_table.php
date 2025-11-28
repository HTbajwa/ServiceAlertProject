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
        //
        Schema::create('daily_usages',function(Blueprint $table){
       $table->id();
       $table->foreignId('user_id')->constrained()->cascadeOnDelete();
       $table->foreignId('service_item_id')->constrained()->cascadeOnDelete();
       $table->date('date');
       $table->float('usage');
       $table->timestamps();

       $table->unique(['user_id','service_item_id','usage']);  //one usage update per day
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
Schema::table('daily_usages',function(Blueprint $table){
$table->dropForeign(['service_item_id']);

});
Schema::dropIfExists("daily_usages");
    }
};
