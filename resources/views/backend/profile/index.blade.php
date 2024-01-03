@extends('backend.master')

@section('title')
    Admin Profile
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
                            <h1 class="page-title">Admin Profile</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row" id="user-profile">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 col-md-12 col-xl-6">
                                            <div class="d-flex flex-wrap align-items-center">
                                                {{-- <div class="profile-img-main rounded">
                                                    <img src="assets/images/faces/6.jpg" alt="img" class="m-0 p-1 rounded hrem-6">
                                                </div> --}}
                                                <div class="ms-4">
                                                    <h4>{{Auth::user()->name}}</h4>
                                                    <p class="text-muted mb-2">Member Since: {{Auth::user()->created_at->format('F Y')}}</p>
                                                    {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-rss"></i> Follow</a>
                                                    <a href="mail-inbox.html" class="btn btn-secondary btn-sm"><i class="fa fa-envelope"></i> E-mail</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="wideget-user-tab">
                                        <div class="tab-menu-heading">
                                            <div class="tabs-menu1">
                                                <ul class="nav">
                                                    <li><a href="#profileMain" class="active show" data-bs-toggle="tab">Profile</a></li>
                                                    <li><a href="#accountSettings" data-bs-toggle="tab">Account Settings</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active show" id="profileMain">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="border-top"></div>
                                            <div class="table-responsive p-5">
                                                <h3 class="card-title">Personal Info</h3>
                                                <table class="table row table-borderless">
                                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                                        <tr>
                                                            <td><strong>Full Name :</strong>{{Auth::user()->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Email :</strong> {{Auth::user()->email}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="accountSettings">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal" data-select2-id="11">
                                                <div class="mb-4 main-content-label">Account</div>
                                                <div class="form-group ">
                                                    <div class="row row-sm">
                                                        <div class="col-md-3">
                                                            <label for="userName" class="form-label">User Name</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="userName" placeholder="User Name" value="{{Auth::user()->name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row row-sm">
                                                        <div class="col-md-3">
                                                            <label for="eMail" class="form-label">Email</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="eMail" placeholder="Email" value="{{Auth::user()->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group float-end">
                                                    <div class="row row-sm">
                                                        <div class="col-md-12">
                                                            <a class="btn btn-info my-1" href="#">Change Password</a>
                                                            <a class="btn btn-outline-danger my-1" href="#">Deactivate Account</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL-END -->
                    </div>
                </div>
            </div>
    </section>
@endsection