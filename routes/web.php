<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Route for home page, returning 'home.index' view
Route::get('/', function () {
    return view('home.index');
});

// Another route for home page, mapped to AdminController's home method
Route::get('/',[AdminController::class,'home']);

// Route to the 'home' page of the admin dashboard
Route::get('/home',[AdminController::class,'index'])->name('home');

// Route for creating a new room (accessible from admin dashboard)
Route::get('/create_room',[AdminController::class,'create_room']);

// Route to handle adding a new room via a POST request
Route::post('/add_room',[AdminController::class,'add_room']);

// Route to view all rooms
Route::get('/view_room',[AdminController::class,'view_room']);

// Route to delete a room by ID (admin only)
Route::get('/room_delete/{id}',[AdminController::class,'room_delete']);

// Route for updating room details (accessible from admin)
Route::get('/room_update/{id}',[AdminController::class,'room_update']);

// Route to update room details via POST request
Route::post('/update_room/{id}',[AdminController::class,'update_room']);

// Route to view details of a specific room (public view)
Route::get('/room_details/{id}',[HomeController::class,'room_details']);

// Route to add a booking for a room (public view)
Route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

// Route to view all bookings (admin only)
Route::get('/bookings', [AdminController::class, 'bookings']);

// Route to delete a booking by ID (admin only)
Route::get('/delete_booking/{id}',[AdminController::class,'delete_booking']);

// Route to update booking status via POST request (admin only)
Route::post('/update_booking_status/{id}', [AdminController::class, 'updateStatus'])->name('update_booking_status');

// Route to view gallery (admin only)
Route::get('/gallary',[AdminController::class,'gallary']);

// Route to upload an image to the gallery (admin only)
Route::post('/upload_gallary',[AdminController::class,'upload_gallary']);

// Route to delete an image from the gallery (admin only)
Route::delete('/delete_gallery/{id}', [AdminController::class, 'delete_gallery'])->name('delete_gallery');

// Route for contact page, redirects to home page
Route::get('/contact', function () {
    return redirect('/');
});

// Route to submit a contact message (public view)
Route::post('/contact',[HomeController::class,'contact']);

// Route to view all contact messages (admin only)
Route::get('/all_messages', [AdminController::class, 'all_messages'])->name('all_messages');

// Route to send email to a user (admin only)
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->name('send.mail');

// Route to send an email via POST request (admin only)
Route::post('mail/{id}',[AdminController::class,'mail']);