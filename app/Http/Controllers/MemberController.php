<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function addMember()
    {
        return view('backend.member.member.index');
    }

    public function storeMember(Request $request)
    {
        $this->validate($request, [
            'member_first_name' => 'required|max:255|alpha_num',
            'member_last_name'  => 'required|max:255|alpha_num',
            'member_institute'  => 'nullable|max:500',
            'member_voter_id'   => 'required|numeric',
            'member_mobile'     => 'required|numeric',
            'member_email'      => 'required|email',
            'member_address'    => 'required|max:1000',
            'member_image'      => 'nullable|image|mimes:jpeg,png|max:2048',

            'gurdian_name'      => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
            'gurdian_voter_id'  => 'required|numeric',
            'gurdian_mobile'    => 'required|numeric',
            'gurdian_email'     => 'nullable|email',
            'gurdian_address'   => 'required|max:1000',

            'local_gurdian_name'        => 'nullable|max:255|regex:/^[a-zA-Z\s]+$/',
            'local_gurdian_occupation'  => 'nullable|max:255|regex:/^[a-zA-Z\s]+$/',
            'local_gurdian_mobile'      => 'nullable|numeric',
            'local_gurdian_email'       => 'nullable|email',
            'local_gurdian_address'     => 'nullable|max:1000'
        ], [
            // for member 
            'member_first_name.required'    => 'First name is required',
            'member_first_name.max'         => 'This field can contain maximum 255 characters',
            'member_first_name.alpha_num'   => 'This field can contain numbers and letters only',

            'member_last_name.required'     => 'Last name is required',
            'member_last_name.max'          => 'This field can contain maximum 255 characters',
            'member_last_name.alpha_num'    => 'This field can contain numbers and letters only',

            'member_institute.max'          => 'This field can contain maximum 500 characters',

            'member_voter_id.required'      => 'Voter id is required',
            'member_voter_id.numeric'       => 'Voter id must be only number',

            'member_mobile.required'        => 'Mobile number is required',
            'member_mobile.numeric'         => 'Mobile number must be only number',

            'member_email.required'         => 'Email is required',
            'member_email.email'            => 'Please give a valid email address',

            'member_address.required'       => 'Address is required',
            'member_address.max'            => 'This field can contain maximum 1000 characters',

            'member_image.image'            => 'This field can only contain image file',
            'member_image.mimes'            => 'Image file must be in jpeg, jpg or png format',
            'member_image.max'              => 'Image file should be in 2048 kb',

            // for gurdian 
            'gurdian_name.required'         => 'Name is required',
            'gurdian_name.max'              => 'This field can contain maximum 255 characters',
            'gurdian_name.regex'            => 'This field can contain and spaces letters only',

            'gurdian_voter_id.required'     => 'Voter id is required',
            'gurdian_voter_id.numeric'      => 'Voter id must be only number',

            'gurdian_mobile.required'       => 'Mobile number is required',
            'gurdian_mobile.numeric'        => 'Mobile number must be only number',

            'gurdian_address.required'      => 'Address is required',
            'gurdian_address.max'           => 'This field can contain maximum 1000 characters',

            // for local gurdian 
            'local_gurdian_name.max'           => 'This field can contain maximum 255 characters',
            'local_gurdian_name.regex'         => 'This field can contain letters and spaces only',

            'local_gurdian_occupation.max'     => 'This field can contain maximum 255 characters',
            'local_gurdian_occupation.regex'   => 'This field can contain letters and spaces only',

            'local_gurdian_mobile.numeric'     => 'Mobile number must be only number',
            'local_gurdian_email.email'        => 'Please give a valid email address',
            'gurdian_address.required'         => 'Address is required',
            'local_gurdian_address.max'        => 'This field can contain maximum 1000 characters'

        ]);
        Member::newMember($request);
        return back()->with('msg', 'Member added successfully..!');
    }

    public function manageMember()
    {
        return view('backend.member.member.manage', [
            'members' => Member::all()
        ]);
    }

    public function showMember(string $id)
    {
        return view('backend.member.member.show', [
            'member' => Member::find($id)
        ]);
    }

    public function editMember(string $id)
    {
        return view('backend.member.member.edit', [
            'member' => Member::find($id)
        ]);
    }

    public function updateMember(Request $request, string $id)
    {
        $this->validate($request, [
            'member_first_name' => 'required|max:255|alpha_num',
            'member_last_name'  => 'required|max:255|alpha_num',
            'member_institute'  => 'nullable|max:500',
            'member_voter_id'   => 'required|numeric',
            'member_mobile'     => 'required|numeric',
            'member_email'      => 'required|email',
            'member_address'    => 'required|max:1000',
            'member_image'      => 'nullable|image|mimes:jpeg,png|max:2048',

            'gurdian_name'      => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
            'gurdian_voter_id'  => 'required|numeric',
            'gurdian_mobile'    => 'required|numeric',
            'gurdian_email'     => 'nullable|email',
            'gurdian_address'   => 'required|max:1000',

            'local_gurdian_name'        => 'nullable|max:255|regex:/^[a-zA-Z\s]+$/',
            'local_gurdian_occupation'  => 'nullable|max:255|regex:/^[a-zA-Z\s]+$/',
            'local_gurdian_mobile'      => 'nullable|numeric',
            'local_gurdian_email'       => 'nullable|email',
            'local_gurdian_address'     => 'nullable|max:1000'
        ], [
            // for member 
            'member_first_name.required'    => 'First name is required',
            'member_first_name.max'         => 'This field can contain maximum 255 characters',
            'member_first_name.alpha_num'   => 'This field can contain numbers and letters only',

            'member_last_name.required'     => 'Last name is required',
            'member_last_name.max'          => 'This field can contain maximum 255 characters',
            'member_last_name.alpha_num'    => 'This field can contain numbers and letters only',

            'member_institute.max'          => 'This field can contain maximum 500 characters',

            'member_voter_id.required'      => 'Voter id is required',
            'member_voter_id.numeric'       => 'Voter id must be only number',

            'member_mobile.required'        => 'Mobile number is required',
            'member_mobile.numeric'         => 'Mobile number must be only number',

            'member_email.required'         => 'Email is required',
            'member_email.email'            => 'Please give a valid email address',

            'member_address.required'       => 'Address is required',
            'member_address.max'            => 'This field can contain maximum 1000 characters',

            'member_image.image'            => 'This field can only contain image file',
            'member_image.mimes'            => 'Image file must be in jpeg, jpg or png format',
            'member_image.max'              => 'Image file should be in 2048 kb',

            // for gurdian 
            'gurdian_name.required'         => 'Name is required',
            'gurdian_name.max'              => 'This field can contain maximum 255 characters',
            'gurdian_name.regex'            => 'This field can contain and spaces letters only',

            'gurdian_voter_id.required'     => 'Voter id is required',
            'gurdian_voter_id.numeric'      => 'Voter id must be only number',

            'gurdian_mobile.required'       => 'Mobile number is required',
            'gurdian_mobile.numeric'        => 'Mobile number must be only number',

            'gurdian_address.required'      => 'Address is required',
            'gurdian_address.max'           => 'This field can contain maximum 1000 characters',

            // for local gurdian 
            'local_gurdian_name.max'           => 'This field can contain maximum 255 characters',
            'local_gurdian_name.regex'         => 'This field can contain letters and spaces only',

            'local_gurdian_occupation.max'     => 'This field can contain maximum 255 characters',
            'local_gurdian_occupation.regex'   => 'This field can contain letters and spaces only',

            'local_gurdian_mobile.numeric'     => 'Mobile number must be only number',
            'local_gurdian_email.email'        => 'Please give a valid email address',
            'gurdian_address.required'         => 'Address is required',
            'local_gurdian_address.max'        => 'This field can contain maximum 1000 characters'

        ]);
        Member::updateMember($request, $id);
        return redirect(route('member.manage'))->with('msg', 'Member updated successfully');
    }

    public function deleteMember(string $id)
    {
        Member::deleteMember($id);
        return back()->with('msg', 'Member deleted successfully');
    }
}
