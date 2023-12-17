<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function addMember(){
        return view('backend.member.member.index');
    }

    public function storeMember(Request $request){
        Member::newMember($request);
        return back()->with('msg', 'Member added successfully..!');
    }

    public function manageMember(){
        return view('backend.member.member.manage', [
            'members' => Member::all()
        ]);
    }

    public function editMember(string $id){
        return view('backend.member.member.edit', [
            'member' => Member::find($id)
        ]);
    }

    public function updateMember(Request $request, string $id)
    {
        Member::updateMember($request, $id);
        return redirect(route('member.manage'))->with('msg', 'Member updated successfully');
    }

    public function deleteMember(string $id)
    {
        Member::deleteMember($id);
        return back()->with('msg', 'Member deleted successfully');
    }
   
}
