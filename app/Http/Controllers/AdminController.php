<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;


use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //admincontrller
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            if($usertype=='user')
            {
               $rooms = Room::all();
             $gallary = Gallary::all();
               return view('home.index',compact('rooms'));  
            }
            else if($usertype=='admin')
            {
                return view('admin.index');
            }
            else
            {
                return redirect()->back();

            }
        }


    }
    public function home()
    {
        $rooms = Room::all();
       return view('home.index',compact('rooms'));
    }
    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $data = new Room;
        $data -> room_title = $request->title;
        $data -> description = $request->description;
        $data -> price = $request->price;
        $data -> wifi = $request->wifi;
        $data -> room_type = $request->type;

       $image=$request->image;
       if($image)
       {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request ->image->move('room',$imagename);
        $data->image=$imagename;
       }

        $data-> save();
        return redirect()->back();

    }
    public function view_room()
    {
        $data =Room ::all();
        return view('admin.view_room',compact('data'));
    }
    public function room_delete($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function room_update($id)
    {
        $data = Room::find($id);
        return view('admin.room_update',compact('data'));
    }
    public function update_room (Request $request,$id)
    {
        $data= Room::find($id);
        if (!$data) 
        {
            return redirect()->back()->with('error', 'Room not found.');
        }
    
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:regular,premium,delux',
            'wifi' => 'required|string|in:yes,no',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update room data
        $data->room_title = $request->input('title');
        $data->description = $request->input('description');
        $data->price = $request->input('price');
        $data->room_type = $request->input('type');
        $data->wifi = $request->input('wifi');
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($data->image && file_exists(public_path('room/' . $data->image))) {
                unlink(public_path('room/' . $data->image));
            }
    
            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('room'), $imageName);
    
            // Update image path in the database
            $data->image = $imageName;
        }
    
        // Save the updated room data
        $data->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Room updated successfully.');
    }
    public function bookings()
    {
        $data=Booking::all();
        return view('admin.bookings',compact('data'));
    }
    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();

    }
    // Update booking status
    public function updateStatus(Request $request, $id)
    {
        // Find the booking by ID
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Update status
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
    public function gallary()
    {
        $gallary = Gallary::all();
        return view('admin.gallary');
    }
    public function upload_gallary(Request $request)
    {
        $data = new Gallary;
        $image = $request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request ->image->move('mygallary',$imagename);
            $data->image=$imagename;
            $data->save();
            return redirect()->back();
        }

    }
    public function delete_gallery($id)
{
    $image = Gallary::find($id);

    if ($image) {
        // Delete the file from the storage
        $filePath = public_path('gallary/' . $image->image);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the record from the database
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

        return redirect()->back()->with('error', 'Image not found.');
    }  
    public function all_messages()
    {
        // Fetch all contact data from the database
        $contacts = Contact::all();

        // Pass the data to the Blade view
        return view('admin.all_messages', compact('contacts'));
    }
}




    


