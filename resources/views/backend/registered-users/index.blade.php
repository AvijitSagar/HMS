@extends('backend.master')

@section('title')
    Registered Members
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
                            <h1 class="page-title">Registered Members</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Registered Members</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Registered Members</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Registered Members</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Member Name</th>
                                                    <th class="border-bottom-0">Email</th>
                                                    <th class="border-bottom-0">Member From</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($registeredUsers as $registeredUser)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $registeredUser->name }}</td>
                                                        <td>{{ $registeredUser->email }}</td>
                                                        <td>{{ $registeredUser->created_at->format('F Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
