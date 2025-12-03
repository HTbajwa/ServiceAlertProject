<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/register', function () {
    return view('auth.register');
})->name("register");
Route::get('/login', function () {
    return view('auth.login');
})->name("login");
Route::get('/user',function(){
    return view('user');
})->name('/user');
Route::get('/service',function(){
    return view('pages.service');
})->name('service');
Route::get('/servicelist',function(){
    return view('pages.userServices');
})->name('servicelist');
Route::get('/cservice',function(){
    return view('pages.cservice');
})->name('cservice');


