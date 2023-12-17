@extends('backend.master')

@section('title')
    Edit Member
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
                            <h1 class="page-title">Edit Member</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Member</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Edit Member</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{Session::get('msg')}}</p>
                                    <form class="needs-validation" action="{{route('member.update', [$member->id])}}" method="POST" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <h6 class="text-center"><i>MEMBER INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_first_name">First name</label>
                                                <input name="member_first_name" type="text" class="form-control" id="member_first_name"
                                                    value="{{$member->member_first_name}}" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_last_name">Last name</label>
                                                <input name="member_last_name" type="text" class="form-control" id="member_last_name"
                                                    value="{{$member->member_last_name}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_institute">School/College/Institute</label>
                                                <input name="member_institute" type="text" class="form-control" id="member_institute" value="{{$member->member_institute}}" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_voter_id">Voter ID</label>
                                                <input name="member_voter_id" type="number" class="form-control" id="member_voter_id" value="{{$member->member_voter_id}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_mobile">Mobile</label>
                                                <input name="member_mobile" type="number" class="form-control" id="member_mobile" value="{{$member->member_mobile}}" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_email">Email</label>
                                                <input name="member_email" type="email" class="form-control" id="member_email" value="{{$member->member_email}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                                <label for="member_address">permanent Address</label>
                                                <textarea name="member_address" class="form-control" id="member_address" cols="30" rows="3" required>{{$member->member_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_image">Current Image</label>
                                                <img class="form-control" style="width: 100px" src="{{asset($member->member_image)}}" alt="member-image" height="100px" width="100px">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_image">Upload New Image</label>
                                                <input name="member_image" type="file" accept="image/*" id="member_image" class="form-control">
                                            </div>
                                        </div>

                                        <br><br>
                                        <hr><br>
                                        <h6 class="text-center"><i>GURDIAN INFO</i></h6>
                                        <br><br>

                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_name">Gurdian Name</label>
                                                <input name="gurdian_name" type="text" class="form-control" id="gurdian_name"
                                                    value="{{$member->gurdian_name}}" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_voter_id">Voter ID</label>
                                                <input name="gurdian_voter_id" type="text" class="form-control" id="gurdian_voter_id"
                                                    value="{{$member->gurdian_voter_id}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_mobile">Gurdian Mobile</label>
                                                <input name="gurdian_mobile" type="number" class="form-control" id="gurdian_mobile"
                                                    value="{{$member->gurdian_mobile}}" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_email">Gurdian Email</label>
                                                <input name="gurdian_email" type="email" class="form-control" id="gurdian_email"
                                                    value="{{$member->gurdian_email}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                                <label for="gurdian_address">Gurdian Address</label>
                                                <textarea name="gurdian_address" class="form-control" id="gurdian_address" cols="30" rows="3" required>{{$member->gurdian_address}}</textarea>
                                            </div>
                                        </div>

                                        <br><br>
                                        <br><br>

                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_name">Local Gurdian Name</label>
                                                <input name="local_gurdian_name" type="text" class="form-control" id="local_gurdian_name"
                                                    value="{{$member->local_gurdian_name}}" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_occupation">Local Gurdian Occupation</label>
                                                <input name="local_gurdian_occupation" type="text" class="form-control" id="local_gurdian_occupation"
                                                    value="{{$member->local_gurdian_occupation}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_mobile">Local Gurdian Mobile</label>
                                                <input name="local_gurdian_mobile" type="number" class="form-control" id="local_gurdian_mobile"
                                                    value="{{$member->local_gurdian_mobile}}" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_email">Local Gurdian Email</label>
                                                <input name="local_gurdian_email" type="email" class="form-control" id="local_gurdian_email"
                                                    value="{{$member->local_gurdian_email}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_address">Local Gurdian Address</label>
                                                <textarea name="local_gurdian_address" class="form-control" id="local_gurdian_address" cols="30" rows="3">{{$member->local_gurdian_address}}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
                                                <label for="local_gurdian_address">Status</label>
                                                <select name="status" class="form-control" id="local_gurdian_address">
                                                    <option value="1" {{$member->status == 1 ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{$member->status == 0 ? 'selected' : ''}}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">UPDATE MEMBER</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
