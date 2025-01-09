<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/',[AdminController::class,'home']);

Route::get('/home',[AdminController::class,'index'])->name('home');

Route::get('/create_room',[AdminController::class,'create_room']);

Route::post('/add_room',[AdminController::class,'add_room']);

Route::get('/view_room',[AdminController::class,'view_room']);

Route::get('/room_delete/{id}',[AdminController::class,'room_delete']);

Route::get('/room_update/{id}',[AdminController::class,'room_update']);

Route::post('/update_room/{id}',[AdminController::class,'update_room']);

Route::get('/room_details/{id}',[HomeController::class,'room_details']);
