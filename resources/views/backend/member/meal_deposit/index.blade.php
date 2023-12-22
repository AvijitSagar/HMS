@extends('backend.master')

@section('title')
    Meal Deposit
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
                            <h1 class="page-title">Meal Deposit</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Meal Deposit</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Meal Deposit</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Meal Deposit</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('mealDeposit.store')}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Meal Deposit INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="bootstrapDatePicker1">Date</label>  <span class="text-danger"><b>*</b></span>
                                                <div class="input-group">
                                                    <div id="datePickerStyle1" class="input-group date" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon input-group-text bg-primary-transparent"><i class="fe fe-calendar text-primary-dark"></i></span>
                                                        <input class="form-control" name="deposit_date" id="bootstrapDatePicker1" type="text"/>
                                                    </div>
                                                </div>
                                                {{-- <p class="text-danger pt-2">{{$errors->has('member_id') ? $errors->first('member_id') : ''}}</p> --}}
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_id">Member</label>  <span class="text-danger"><b>*</b></span>
                                                <select name="member_id" class="form-control" id="member_id">
                                                    <option value="" disabled selected>Select Member</option>
                                                        @foreach ($members as $member)
                                                            <option value="{{$member->id}}" >
                                                                {{ $member->member_first_name . ' ' . $member->member_last_name }}
                                                            </option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="room">Room</label>
                                                <input name="room" disabled type="text" class="form-control" id="room" value="" required>
                                                <p class="text-danger pt-2">{{$errors->has('room') ? $errors->first('room') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="deposit_amount">Deposit Amount</label> <span class="text-danger"><b>*</b></span>
                                                <input name="deposit_amount" type="number" class="form-control" id="deposit_amount" required>
                                                <p class="text-danger pt-2">{{$errors->has('deposit_amount') ? $errors->first('deposit_amount') : ''}}</p>
                                            </div>
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary">Add Deposit</button>
                                    </form>
                                </div>
                                
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title">Manage Meal Deposit</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                            <div class="table-responsive">
                                                <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">SL</th>
                                                            <th class="border-bottom-0">Member</th>
                                                            {{-- <th class="border-bottom-0">Seat</th> --}}
                                                            <th class="border-bottom-0">Deposit Amount</th>
                                                            <th class="border-bottom-0">Deposit date</th>
                                                            <th class="border-bottom-0">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($mealDeposits as $mealDeposit)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$mealDeposit->member->member_first_name . ' ' . $mealDeposit->member->member_last_name}}</td>
                                                                {{-- <td>13b</td> --}}
                                                                <td>{{$mealDeposit->deposit_amount}} &#2547;</td>
                                                                <td>{{$mealDeposit->deposit_date}}</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="{{route('mealDeposit.edit', [$mealDeposit->id])}}"
                                                                            class="btn btn-success">
                                                                            <i class="fe fe-edit"></i>
                                                                        </a>
                                                                        &nbsp;&nbsp;
                                                                        <form action="{{route('mealDeposit.delete', [$mealDeposit->id])}}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete seat:  for user: {{$mealDeposit->member->member_first_name . ' ' . $mealDeposit->member->member_last_name}}?')">
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
    </section>
@endsection