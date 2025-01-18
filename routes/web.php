<?php

use GuzzleHttp\Middleware;
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

Route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

Route::get('/bookings', [AdminController::class, 'bookings'])
    ->middleware(['auth', 'admin']);

Route::get('/delete_booking/{id}',[AdminController::class,'delete_booking']);

Route::post('/update_booking_status/{id}', [AdminController::class, 'updateStatus'])->name('update_booking_status');

Route::get('/gallary',[AdminController::class,'gallary']);

Route::post('/upload_gallary',[AdminController::class,'upload_gallary']);

Route::delete('/delete_gallery/{id}', [AdminController::class, 'delete_gallery'])->name('delete_gallery');

Route::get('/contact', function () {
    return redirect('/');
});

Route::post('/contact',[HomeController::class,'contact']);

Route::get('/all_messages', [AdminController::class, 'all_messages'])->name('all_messages');

Route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->name('send.mail');

Route::post('mail/{id}',[AdminController::class,'mail']);

Route::get('/our_rooms',[HomeController::class,'our_rooms']);

















