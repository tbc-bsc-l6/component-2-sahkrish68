<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

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
}


    


