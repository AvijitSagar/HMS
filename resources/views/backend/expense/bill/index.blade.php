@extends('backend.master')

@section('title')
   Bills
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
                            <h1 class="page-title">Grocery</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Bills</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bills Add</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Bills</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <p class="text-center text-danger">{{ Session::get('error_msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('bill.add')}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Bills Expenses INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="month_year">Select Month and Year</label> <span class="text-danger"><b>*</b></span>
                                                <input type="month" class="form-control" name="month_year" id="month_year">
                                                <p class="text-danger pt-2">{{$errors->has('month_year') ? $errors->first('month_year') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="electric_bill">Electric Bill</label> <span class="text-danger"><b>*</b></span>
                                                <input name="electric_bill" type="number" class="form-control" id="electric_bill">
                                                <p class="text-danger pt-2">{{$errors->has('electric_bill') ? $errors->first('electric_bill') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="gas_bill">Gas Bill</label>
                                                <input name="gas_bill" type="number" class="form-control" id="gas_bill">
                                                <p class="text-danger pt-2">{{$errors->has('gas_bill') ? $errors->first('gas_bill') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="water_bill">Water Bill</label>
                                                <input name="water_bill" type="number" class="form-control" id="water_bill">
                                                <p class="text-danger pt-2">{{$errors->has('water_bill') ? $errors->first('water_bill') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="internet_bill">Internet Bill</label>
                                                <input name="internet_bill" type="number" class="form-control" id="internet_bill">
                                                <p class="text-danger pt-2">{{$errors->has('internet_bill') ? $errors->first('internet_bill') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="dish_bill">Dish Bill</label>
                                                <input name="dish_bill" type="number" class="form-control" id="dish_bill">
                                                <p class="text-danger pt-2">{{$errors->has('dish_bill') ? $errors->first('dish_bill') : ''}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Add Bill Expence</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection