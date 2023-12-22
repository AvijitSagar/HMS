@extends('backend.master')

@section('title')
    Meal Deposit Edit
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
                            <h1 class="page-title">Meal Deposit Edit</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Meal Deposit</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Meal Deposit Edit</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Edit Meal Deposit</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('mealDeposit.update', [$mealDeposit->id])}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Meal Deposit INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="bootstrapDatePicker1">Date</label>  <span class="text-danger"><b>*</b></span>
                                                <div class="input-group">
                                                    <div id="datePickerStyle1" class="input-group date" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon input-group-text bg-primary-transparent"><i class="fe fe-calendar text-primary-dark"></i></span>
                                                        <input class="form-control" value="{{$mealDeposit->deposit_date}}" name="deposit_date" id="bootstrapDatePicker1" type="text"/>
                                                        <p class="text-danger pt-2">{{$errors->has('deposit_date') ? $errors->first('deposit_date') : ''}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="member_id">Member</label>  <span class="text-danger"><b>*</b></span>
                                                <select name="member_id" class="form-control" id="member_id">
                                                    <option value="" disabled selected>Select Member</option>
                                                        @foreach ($members as $member)
                                                            <option value="{{$member->id}}" {{$member->id == $mealDeposit->member_id ? 'selected' : ''}} >
                                                                {{ $member->member_first_name . ' ' . $member->member_last_name }}
                                                            </option>
                                                        @endforeach
                                                </select>
                                                <p class="text-danger pt-2">{{$errors->has('member_id') ? $errors->first('member_id') : ''}}</p>
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
                                                <input name="deposit_amount" value="{{$mealDeposit->deposit_amount}}" type="number" class="form-control" id="deposit_amount" required>
                                                <p class="text-danger pt-2">{{$errors->has('deposit_amount') ? $errors->first('deposit_amount') : ''}}</p>
                                            </div>
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary">Edit Deposit</button>
                                        <a href="{{route('mealDeposit.add')}}">
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