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
                                    <form class="needs-validation" action="{{route('store.seat.alocated')}}" method="POST" novalidate>
                                        @csrf
                                        <h6 class="text-center"><i>Seat INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_id">Available member</label>  <span class="text-danger"><b>*</b></span>
                                                <select name="member_id" class="form-control" id="member_id">
                                                    <option value="" disabled selected>Select Member</option>
                                                    @foreach ($members as $member)
                                                        @php
                                                            $allocation = $seatAlocations->where('member_id', $member->id)->first();
                                                            $alreadyAllocated = $seatAlocations->where('member_id', $member->id)->isNotEmpty();
                                                        @endphp
                                                        <option value="{{ $member->id }}" {{ $alreadyAllocated ? 'disabled' : '' }}>
                                                            {{ $member->member_first_name . ' ' . $member->member_last_name }}
                                                            {{-- {{ $alreadyAllocated ? ' Allocated to ' . $seatAlocations->where('member_id', $member->id)->first()->room_name : '' }} --}}
                                                            {{ $alreadyAllocated ? '-> ' . $allocation->room->floor . ' ' . $allocation->room->room . ' ' . $allocation->room->seat : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger pt-2">{{$errors->has('member_id') ? $errors->first('member_id') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="room_id">Available seat</label> <span class="text-danger"><b>*</b></span>
                                                <select name="room_id" class="form-control" id="room_id">
                                                    <option value="" disabled selected>Select Seat</option>
                                                    @foreach ($rooms as $room)
                                                        <option value="{{ $room->id }}">
                                                            {{ $room->floor . ' ' . $room->room . ' ' . $room->seat }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger pt-2">{{$errors->has('room_id') ? $errors->first('room_id') : ''}}</p>
                                            </div>
                                        </div>
                                        
                                        <br>
                                        <button type="submit" class="btn btn-primary">Alocate Seat</button>
                                    </form>
                                </div>

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
                                                                <th class="border-bottom-0">member</th>
                                                                <th class="border-bottom-0">Seat</th>
                                                                <th class="border-bottom-0">Seat rent</th>
                                                                <th class="border-bottom-0">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($seatAlocations as $seatAlocation)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$seatAlocation->member->member_first_name . ' ' . $seatAlocation->member->member_last_name}}</td>
                                                                    <td>{{$seatAlocation->room->floor . ' ' . $seatAlocation->room->room . ' ' . $seatAlocation->room->seat}}</td>
                                                                    <td>{{$seatAlocation->room->seat_rent}} &#2547;</td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a href="{{route('edit.seat.alocated', [$seatAlocation->id])}}"
                                                                                class="btn btn-success">
                                                                                <i class="fe fe-edit"></i>
                                                                            </a>
                                                                            &nbsp;&nbsp;
                                                                            <form action="{{route('delete.seat.alocated', [$seatAlocation->id])}}" method="POST">
                                                                                @csrf
                                                                                {{-- room_id ta hidden kore rakha hoyeche jeno SeatController a room er id dhore active status change kora jay --}}
                                                                                <input type="hidden" name="room_id" value="{{ $seatAlocation->room_id }}">
                                                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete seat:  for user:   ?')">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
