@extends('backend.master')

@section('title')
    Seat
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
                            <h1 class="page-title">Seat</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Member</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Seat</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Seat</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" action="" method="POST" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <h6 class="text-center"><i>Seat INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_id">Name</label>
                                                <select name="member_id" class="form-control" id="member_id">
                                                    <option value="" disabled selected>Select Member</option>
                                                    @foreach ($members as $member)
                                                        <option value="{{ $member->id }}" {{$member->id == $seatAlocations->member_id ? 'selected' : ''}}>
                                                            {{ $member->member_first_name . ' ' . $member->member_last_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{-- <input name="floor" type="text" class="form-control"
                                                    id="floor" value="{{$seat->member->member_first_name . ' ' . $seat->member->member_last_name}}"> --}}
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="seat_id">Seat</label>
                                                <select name="seat_id" class="form-control" id="seat_id">
                                                    <option value="" disabled selected>Select Seat</option>
                                                    @foreach ($rooms as $room)
                                                        <option value="{{ $room->id }}" {{$room->id == $seatAlocations->room_id ? 'selected' : ''}}>
                                                            {{ $room->seat . ' ' . $room->room }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {{-- <input name="floor" type="text" class="form-control"
                                                    id="floor" value="{{$seat->seat->seat . ' ' . $seat->seat->room}}"> --}}
                                            </div>
                                        </div>
                                        
                                        <br>
                                        <button type="submit" class="btn btn-primary">Confirm Edit</button>
                                        <a href="{{route('seat.alocate')}}">
                                            {{-- <button class="btn btn-danger">Cancel</button> --}}
                                            <input type="button" class="btn btn-danger" value="cancel">
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
