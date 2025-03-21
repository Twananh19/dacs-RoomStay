<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $data = new Room();

        $data->room_title= $request->title;
        $data->description= $request->description;
        $data->price= $request->price;
        $data->wifi= $request->wifi;
        $data->room_type= $request->type;
        $image= $request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image=$imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function view_room()
    {
        $data = Room::all();

        return view('admin.view_room', compact('data'));
    }

    public function room_delete($id)
    {
        $data = Room::find($id);
        $data-> delete();
        return redirect()->back();
    }

    public function room_update($id)
    {
        $data= Room::find($id);

        return view('admin.update_room', compact('data'));
    }

    public function edit_room(Request $request, $id)
    {
        $data= Room::find($id);

        $data->room_title= $request->title;
        $data->description= $request->description;
        $data->price= $request->price;
        $data->wifi= $request->wifi;
        $data->room_type= $request->type;

        $image=$request->image;
        if ($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function bookings()
    {
        $data=Booking::all();
        return view('admin.booking', compact('data'));
    }

    public function delete_booking($id)
    {
        $data= Booking::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function approve_book($id)
    {
        $booking= Booking::find($id);
        $booking->status='approved';
        $booking->save();
        return redirect()->back();
    }
    
    public function reject_book($id)
    {
        $booking= Booking::find($id);
        $booking->status='rejected';
        $booking->save();
        return redirect()->back();
    }
}
