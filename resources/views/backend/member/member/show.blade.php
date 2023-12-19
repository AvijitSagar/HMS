@extends('backend.master')

@section('title')
    Manage Members
@endsection

@section('content')
    <section>
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">


                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Show Member</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Member</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Member</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h3 class="card-title">Member Information</h3>
                                    </div>
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('msg') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="editable-responsive-table"
                                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                <tbody>
                                                    <tr>
                                                        <th>Member Name</th>
                                                        <td>{{ $member->member_first_name . ' ' . $member->member_last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Institute</th>
                                                        <td>{{ $member->member_institute }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Voter Id</th>
                                                        <td>{{ $member->member_voter_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile</th>
                                                        <td>{{ $member->member_mobile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $member->member_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{ $member->member_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Member Image</th>
                                                        <td>
                                                            <img src="{{ asset($member->member_image) }}" height="70px"
                                                                width="70px" alt="member_image">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gurdian Name</th>
                                                        <td>{{ $member->gurdian_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gurdian Voter Id</th>
                                                        <td>{{ $member->gurdian_voter_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gurdian Mobile</th>
                                                        <td>{{ $member->gurdian_mobile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gurdian Email</th>
                                                        <td>{{ $member->gurdian_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gurdian Address</th>
                                                        <td>{{ $member->gurdian_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Local Gurdian Name</th>
                                                        <td>{{ $member->local_gurdian_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Local Gurdian Cooupation</th>
                                                        <td>{{ $member->local_gurdian_occupation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Local Gurdian Mobile</th>
                                                        <td>{{ $member->local_gurdian_mobile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Local Gurdian Email</th>
                                                        <td>{{ $member->local_gurdian_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Local Gurdian Address</th>
                                                        <td>{{ $member->local_gurdian_address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a href="{{route('member.manage')}}">
                                                {{-- <button class="btn btn-danger">Cancel</button> --}}
                                                <input type="button" class="btn btn-danger" value="Go back">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
            </div>
        </div>
    </section>
@endsection
