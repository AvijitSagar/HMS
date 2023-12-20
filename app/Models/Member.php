<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    private static $member, $image, $imageName, $directory;

    public static function imageUpload($request){
        if ($request->hasFile('member_image')) {
            self::$image = $request->file('member_image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/member-image/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory . self::$imageName;
        } else {
            return 'No file uploaded.';
        }
    }

    public static function newMember($request){

        self::$member = new Member();

        self::$member->member_first_name = $request->member_first_name;
        self::$member->member_last_name = $request->member_last_name;
        self::$member->member_institute = $request->member_institute;
        self::$member->member_voter_id = $request->member_voter_id;
        self::$member->member_mobile = $request->member_mobile;
        self::$member->member_email = $request->member_email;
        self::$member->member_address = $request->member_address;
        self::$member->member_image = self::imageUpload($request);

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

    public static function updateMember($request, $id){

        self::$member = Member::find($id);

        self::$member->member_first_name = $request->member_first_name;
        self::$member->member_last_name = $request->member_last_name;
        self::$member->member_institute = $request->member_institute;
        self::$member->member_voter_id = $request->member_voter_id;
        self::$member->member_mobile = $request->member_mobile;
        self::$member->member_email = $request->member_email;
        self::$member->member_address = $request->member_address;
        if($request->file('member_image')){
            if(file_exists(self::$member->member_image)){
                unlink(self::$member->member_image);
            }
            self::$member->member_image = self::imageUpload($request);
        }

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

        self::$member->status = $request->status;

        self::$member->save();

    }

    public static function deleteMember($id){
        self::$member = Member::find($id);
        if(file_exists(self::$member->member_image)){
            unlink(self::$member->member_image);
        }
        self::$member->delete();
    }

    // member wise allocated seat ebong seat rent dekhanor jonno one to one relattion
    //karon,  each member is associated with one seat, and each seat belongs to one member.
    public function seat(){
        return $this->hasOne(Seat::class);
    }
}
