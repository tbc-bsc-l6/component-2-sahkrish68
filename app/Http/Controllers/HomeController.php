<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class HomeController extends Controller
{
   public function room_details($id)
   {
    $room = Room::find($id);
    return view('home.room_details',compact('room'));

   }
   public function add_booking(Request $request, $id)
   {
     // Validate input data
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email',
      'phone' => 'required|digits_between:10,15',
      'startDate' => 'required|date',
      'endDate' => 'required|date|after:startDate',
  ]);

  // Check for overlapping bookings
  $overlappingBooking = Booking::where('room_id', $id)
      ->where(function ($query) use ($request) {
          $query->whereBetween('start_date', [$request->startDate, $request->endDate])
                ->orWhereBetween('end_date', [$request->startDate, $request->endDate])
                ->orWhere(function ($query) use ($request) {
                    $query->where('start_date', '<=', $request->startDate)
                          ->where('end_date', '>=', $request->endDate);
                });
      })
      ->orderBy('end_date', 'desc') // Get the latest end date from conflicting bookings
      ->first();

  if ($overlappingBooking) {
      $nextAvailableDate = date('Y-m-d', strtotime($overlappingBooking->end_date . ' +1 day'));
      return redirect()->back()->with('error', "The room has already been booked for the selected dates. The room is available after $nextAvailableDate.");
  }

  // Create new booking if no conflict
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
    public function contact(Request $request)
    {
        $contact= new Contact;

        $contact -> name= $request -> name;
        $contact -> email= $request -> email;
        $contact -> phone= $request -> phone;
        $contact -> message= $request -> message;

        $contact ->save();
        if ($contact->save()) {
            return redirect()->back()->with('success', 'Response has been sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to send the request.');
        }
    }
    
}



