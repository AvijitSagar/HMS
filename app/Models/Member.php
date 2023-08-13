<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    private static $member;

    public static function newMember($request){

        self::$member = new Member();

        self::$member->member_first_name = $request->member_first_name;
        self::$member->member_last_name = $request->member_last_name;
        self::$member->member_institute = $request->member_institute;
        self::$member->member_voter_id = $request->member_voter_id;
        self::$member->member_mobile = $request->member_mobile;
        self::$member->member_email = $request->member_email;
        self::$member->member_address = $request->member_address;
        self::$member->member_image = $request->member_image;

        self::$member->gurdian_name = $request->gurdian_name;
        self::$member->gurdian_voter_id = $request->gurdian_voter_id;
        self::$member->gurdian_mobile = $request->gurdian_mobile;
        self::$member->gurdian_email = $request->gurdian_email;
        self::$member->gurdian_address = $request->gurdian_address;

        self::$member->local_gurdian_name = $request->local_gurdian_name;
        self::$member->local_gurdian_occupation = $request->local_gurdian_occupation;
        self::$member->local_gurdian_mobile = $request->local_gurdian_mobile;
        self::$member->local_gurdian_email = $request->local_gurdian_email;
        self::$member->local_gurdian_address = $request->local_gurdian_address;

        self::$member->save();

    }
}
