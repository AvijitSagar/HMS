@extends('backend.master')

@section('title')
    Room
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
                            <h1 class="page-title">Room</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Room</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Room</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Room Edit</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('room.update', $room->id)}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Room INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="floor">Floor</label>
                                                <input name="floor" type="text" class="form-control"
                                                    id="floor" value="{{$room->floor}}">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="room">Room</label>
                                                <input name="room" type="text" class="form-control"
                                                    id="room" value="{{$room->room}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="seat">Seat</label>
                                                <input name="seat" type="text" class="form-control"
                                                    id="seat" value="{{$room->seat}}">
                                            </div>
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary">Edit Room & Seat</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
b