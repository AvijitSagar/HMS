@extends('backend.master')

@section('title')
   Grocery
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Grocery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Grocery Add</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Grocery Expenses</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('grocery.add')}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Grocery Expenses INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="bootstrapDatePicker1">Date</label>  <span class="text-danger"><b>*</b></span>
                                                <div class="input-group">
                                                    <div id="datePickerStyle1" class="input-group date" data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon input-group-text bg-primary-transparent"><i class="fe fe-calendar text-primary-dark"></i></span>
                                                        <input class="form-control" name="grocery_date" id="bootstrapDatePicker1" type="text"/>
                                                        <p class="text-danger pt-2">{{$errors->has('grocery_date') ? $errors->first('grocery_date') : ''}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="grocery_expense">Expence Amount</label> <span class="text-danger"><b>*</b></span>
                                                <input name="grocery_expense" type="number" class="form-control" id="grocery_expense">
                                                <p class="text-danger pt-2">{{$errors->has('grocery_expense') ? $errors->first('grocery_expense') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                                <label for="grocery_description">Description</label>
                                                <textarea name="grocery_description" class="form-control" id="summernote" cols="30" rows="3"></textarea>
                                                <p class="text-danger pt-2">{{$errors->has('grocery_description') ? $errors->first('grocery_description') : ''}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Add Grocery Expence</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection