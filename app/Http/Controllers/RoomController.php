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
        Room::updateRoom($request, $id);
        return redirect(route('room.manage'))->with('msg', 'Room info updated successfully...!');
    }

    public function deleteRoom(string $id){
        Room::deleteRoom($id);
        return back()->with('msg', 'Room deleted successfully...!');
    }
}
