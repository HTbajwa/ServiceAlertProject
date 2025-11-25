<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



//register
Route::post("/register",[UsersController::class,"UserCreate"]);

//login
Route::post("/login",[AuthController::class,"UserLogin"]);

//Middleware Authenticated Routes
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
Route::post("/category",[CategoryController::class,"Categories"]);
Route::get("/category",[CategoryController::class,"getAllCategories"]);
Route::get("/category/{id}",[CategoryController::class,"getCategoryById"]);
Route::put("/category/{id}",[CategoryController::class,"updateCategoryById"]);
Route::delete("/category/{id}",[CategoryController::class,"deleteById"]);    
});


Route::middleware('auth:sanctum','user')->group(function(){
Route::post("/service",[ServiceController::class,"ServiceCreate"]);
Route::put("/service/{id}",[ServiceController::class,"updateCategoryById"]);
Route::get("/service/{id}",[ServiceController::class,"getService"]);
Route::get("/service",[ServiceController::class,"getAllServices"]);
Route::delete("/service/{id}",[ServiceController::class,"delServiceById"]);

});


                          