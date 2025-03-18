<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
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
}
