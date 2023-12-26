@extends('backend.master')

@section('title')
    Meal
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Meal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Meal Count</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Meal Count</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('meal.store')}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Meal Count INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="month_year">Select Month and Year</label> <span class="text-danger"><b>*</b></span>
                                                <input type="month" class="form-control" name="month_year" id="month_year">
                                                <p class="text-danger pt-2">{{$errors->has('month_year') ? $errors->first('month_year') : ''}}</p>
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
                                                <label for="total_meal">Total Meal</label> <span class="text-danger"><b>*</b></span>
                                                <input name="total_meal" type="number" class="form-control" id="total_meal" required>
                                                <p class="text-danger pt-2">{{$errors->has('total_meal') ? $errors->first('total_meal') : ''}}</p>
                                            </div>
                                        </div>

                                        <br>
                                        <button type="submit" class="btn btn-primary">Add Meal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection