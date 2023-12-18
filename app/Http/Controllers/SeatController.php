<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function alocateSeat(){
        return view('backend.member.seat.index', [
            'members' => Member::all(),
            'rooms' => Room::where('status', 1)->get(),
            'seatAlocations' => Seat::all()
        ]);
    }

    public function storeAlocatedSeat(Request $request){
        Seat::alocateSeat($request);
        Room::where('id', $request->room_id)->update(['status' => 0]);
        return back()->with('msg', 'Seat alocated successfully...!');
    }
}
