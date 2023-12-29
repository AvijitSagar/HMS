@extends('backend.master')

@section('title')
    Meal Rate
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
                            <h1 class="page-title">Meal Rate</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Meal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Meal Rate</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Meal Rate</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('meal-rate.store')}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Meal Rate INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="month_year">Month and Year</label> <span class="text-danger"><b>*</b></span>
                                                <input type="month" class="form-control" name="month_year" id="" value="{{$selectedMonthYear}}" readonly>
                                                <p class="text-danger pt-2">{{$errors->has('month_year') ? $errors->first('month_year') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="total_meal_of_the_month">Total Meal Of The Month</label> <span class="text-danger"><b>*</b></span>
                                                <input name="total_meal_of_the_month" value="{{$totalMeals}}" type="number" class="form-control" id="total_meal_of_the_month" readonly>
                                                <p class="text-danger pt-2">{{$errors->has('total_meal_of_the_month') ? $errors->first('total_meal_of_the_month') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="total_grocery_of_the_month">Total Grocery Amount Of The Month</label> <span class="text-danger"><b>*</b></span>
                                                <input name="total_grocery_of_the_month" value="{{$totalGroceryCost}}" type="number" class="form-control" id="total_grocery_of_the_month" readonly>
                                                <p class="text-danger pt-2">{{$errors->has('total_grocery_of_the_month') ? $errors->first('total_grocery_of_the_month') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="meal_rate">Meal Rate</label> <span class="text-danger"><b>*</b></span>
                                                <input name="meal_rate" value="{{$mealRate}}" type="number" class="form-control" id="meal_rate" readonly>
                                                <p class="text-danger pt-2">{{$errors->has('meal_rate') ? $errors->first('meal_rate') : ''}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Add meal rate</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection