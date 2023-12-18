<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    private static $seat;

    public static function alocateSeat($request){
        self::$seat = new Seat();
        self::$seat->member_id = $request->member_id;
        self::$seat->room_id = $request->room_id;
        self::$seat->save();
    }

    public static function deleteAlocatedSeat($id){
        self::$seat = Seat::find($id);
        self::$seat->delete();
    }

    // this is because, ekta seat er jonno member ekjon e thakbe. so this is the one to one relationship between member and seat model
    public function member(){
        return $this->belongsTo(Member::class);
    }
    // this is because, ekta seat er jonno room ekta e thakbe. so this is the one to one relationship between room and seat model
    public function room(){
        return $this->belongsTo(Room::class);
    }

}
