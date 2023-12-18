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
            'rooms' => Room::all(),
            'seatAlocations' => Seat::all()
        ]);
    }

    public function storeAlocatedSeat(Request $request){
        Seat::alocateSeat($request);
        return back()->with('msg', 'Seat alocated successfully...!');
    }
}
