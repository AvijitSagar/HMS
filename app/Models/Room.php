<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    private static $room;

    public static function newRoom($request){
        self::$room = new Room();
        self::$room->floor = $request->floor;
        self::$room->room = $request->room;
        self::$room->seat = $request->seat;
        self::$room->seat_rent = $request->seat_rent;
        self::$room->save();
    }

    public static function updateRoom($request, $id){
        self::$room = Room::find($id);
        self::$room->floor = $request->floor;
        self::$room->room = $request->room;
        self::$room->seat = $request->seat;
        self::$room->seat_rent = $request->seat_rent;
        self::$room->status = $request->room_status;
        self::$room->save();
    }

    public static function deleteRoom($id){
        self::$room = Room::find($id);
        self::$room->delete();
    }
}
