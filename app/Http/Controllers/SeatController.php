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
        $this->validate($request, [
            'member_id' => 'required',
            'room_id'   => 'required'
        ], [
            'member_id.required'    => 'Please select a member',
            'room_id.required'      => 'Please select a room'
        ]);
        Seat::alocateSeat($request);
        Room::where('id', $request->room_id)->update(['status' => 0]);
        return back()->with('msg', 'Seat alocated successfully...!');
    }

    public function editAlocatedSeat(string $id){
        return view('backend.member.seat.edit', [
            'members' => Member::all(),
            'rooms' => Room::all(),
            'seatAlocations' => Seat::find($id)
        ]);
    }

    public function deleteAlocatedSeat(Request $request, $id){
        Seat::deleteAlocatedSeat($id);
        Room::where('id', $request->room_id)->update(['status' => 1]);
        return back()->with('msg', 'Seat unallocated from the member successfully...!');
    }
}
