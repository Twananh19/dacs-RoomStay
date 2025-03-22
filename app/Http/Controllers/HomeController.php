<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;


class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user() -> usertype == 'user')
            {
                $room= Room::all();

        // $gallary = gallary::all();

                return view('home.index',compact('room'));

            }

            else{
                return view('admin.home');
            }
        }

        else
        {
            return redirect()->back();
        }
    }

    public function home()
    {
        $room= Room::all();

        // $gallary = gallary::all();

        return view('home.index',compact('room'));
    }

    public function room_details($id)
    {
        $room = Room::find($id);

        return view('home.room_details', compact('room'));
    }


    public function add_booking(Request $request, $id)
    {

        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);
        


        $data = new Booking;

        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $start_date = $request->startDate;
        $end_date = $request->endDate;
        $isBooked = Booking::where('room_id',$id)
        ->where('start_date','<=',$end_date)
        ->where('end_date','>=',$start_date)->exists();

        if ($isBooked) {
            return redirect()->back()->with('message', 'Room is already booked, please try a different date');
        } else {


            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;

        $data->save();

        return redirect()->back()->with('message','Room Booked Successfully');
        
        }
        

    }

}
