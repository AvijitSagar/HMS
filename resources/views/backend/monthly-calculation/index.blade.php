@extends('backend.master')

@section('title')
    Show Monthly Calculation
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
                            <h1 class="page-title">Show Monthly Calculation</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Monthly Calculation</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Monthly Calculation</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('msg') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('calculate.monthly.calculation')}}" method="POST">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                    <label for="month_year">Select Month and Year</label> <span class="text-danger"><b>*</b></span>
                                                    <input type="month" class="form-control" name="month_year" id="date">
                                                    <p class="text-danger pt-2">{{$errors->has('month_year') ? $errors->first('month_year') : ''}}</p>
                                                </div>
                                            </div>
                                            <button class="btn btn-success">calculate</button>
                                        </form>
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
