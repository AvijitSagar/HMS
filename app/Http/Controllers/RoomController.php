<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function addRoom(){
        return view('backend.room.index');
    }

    public function storeRoom(Request $request){
        $this->validate($request, [
            'floor'     => 'required|integer|min:1',
            'room'      => 'required|integer|min:1',
            'seat'      => 'required|alpha',
            'seat_rent' => 'required|integer|min:1000'
        ], [
            'floor.required'    => 'Please add the floor',
            'floor.integer'     => 'Floor number must be integer',
            'floor.min'         => 'Floor number must be minimum 1',

            'room.required'     => 'Please add the room',
            'room.integer'      => 'Room number must be integer',
            'room.min'          => 'Room number must be minimum 1',

            'seat.required'     => 'Please add the seat',
            'seat.alpha'        => 'seat can only contain letters',

            'seat_rent.required'    => 'Please add the seat rent for the seat',
            'seat_rent.integer'     => 'Seat rent must be integer',
            'seat_rent.min'         => 'Seat rent must be greater than 1,000 taka'
        ]);
        Room::newRoom($request);
        return back()->with('msg', 'Room created successfully..!');
    }

    public function manageRoom(){
        return view('backend.room.manage', [
            'rooms' => Room::all()
        ]);
    }

    public function editRoom(string $id){
        return view('backend.room.edit', [
            'room' => Room::find($id)
        ]);
    }

    public function updateRoom(Request $request, string $id){
        $this->validate($request, [
            'floor'     => 'required|integer|min:1',
            'room'      => 'required|integer|min:1',
            'seat'      => 'required|alpha',
            'seat_rent' => 'required|integer|min:1000'
        ], [
            'floor.required'    => 'Please add the floor',
            'floor.integer'     => 'Floor number must be integer',
            'floor.min'         => 'Floor number must be minimum 1',

            'room.required'     => 'Please add the room',
            'room.integer'      => 'Room number must be integer',
            'room.min'          => 'Room number must be minimum 1',

            'seat.required'     => 'Please add the seat',
            'seat.alpha'        => 'seat can only contain letters',

            'seat_rent.required'    => 'Please add the seat rent for the seat',
            'seat_rent.integer'     => 'Seat rent must be integer',
            'seat_rent.min'         => 'Seat rent must be greater than 1,000 taka'
        ]);
        Room::updateRoom($request, $id);
        return redirect(route('room.manage'))->with('msg', 'Room info updated successfully...!');
    }

    public function deleteRoom(string $id){
        Room::deleteRoom($id);
        return back()->with('msg', 'Room deleted successfully...!');
    }
}
