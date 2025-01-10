<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{
   public function room_details($id)
   {
    $room = Room::find($id);
    return view('home.room_details',compact('room'));

   }
   public function add_booking(Request $request, $id)
   {
      $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email',
         'phone' => 'required|digits_between:10,15',
         'startDate' => 'required|date',
         'endDate' => 'required|date|after:startDate',
     ]);
 
     $data = new Booking;
     $data->room_id = $id;
     $data->name = $request->name;
     $data->email = $request->email;
     $data->phone = $request->phone;
     $data->start_date = $request->startDate;
     $data->end_date = $request->endDate;
 
     if ($data->save()) {
         return redirect()->back()->with('success', 'Room booked successfully!');
     } else {
         return redirect()->back()->with('error', 'Failed to book the room.');
     }

   }
}
