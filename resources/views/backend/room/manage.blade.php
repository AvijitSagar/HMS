@extends('backend.master')

@section('title')
    Manage Rooms
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
                            <h1 class="page-title">Manage Rooms</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Rooms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Rooms</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Rooms</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Floor</th>
                                                    <th class="border-bottom-0">Room</th>
                                                    <th class="border-bottom-0">Seat</th>
                                                    <th class="border-bottom-0">Name</th>
                                                    <th class="border-bottom-0">Seat rent</th>
                                                    <th class="border-bottom-0">Status</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rooms as $room)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$room->floor}}</td>
                                                        <td>{{$room->room}}</td>
                                                        <td>{{$room->seat}}</td>
                                                        <td class="text-primary">{{$room->floor . $room->room . $room->seat}}</td>
                                                        <td>{{$room->seat_rent}} &#2547;</td>
                                                        <td class="{{$room->status == 1 ? 'text-success' : 'text-danger'}}">{{$room->status == 1 ? 'Available' : 'Booked'}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('room.edit', [$room->id])}}"
                                                                    class="btn btn-success">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <form action="{{route('room.delete', [$room->id])}}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete room {{$room->seat . $room->room}} ?')">
                                                                        <i class="fe fe-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
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
