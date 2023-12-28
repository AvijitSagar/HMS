@extends('backend.master')

@section('title')
   Other Expense
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
                            <h1 class="page-title">Other Expense</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Other Expense</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Other Expense Edit</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Other Expense</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <p class="text-center text-danger">{{ Session::get('error_msg') }}</p>
                                    <form class="needs-validation" novalidate action="{{route('otherExpense.update', [$otherExpense->id])}}" method="POST">
                                        @csrf
                                        <h6 class="text-center"><i>Other Expense INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="month_year">Select Month and Year</label> <span class="text-danger"><b>*</b></span>
                                                <input type="month" value="{{$otherExpense->month_year}}" class="form-control" name="month_year" id="month_year">
                                                <p class="text-danger pt-2">{{$errors->has('month_year') ? $errors->first('month_year') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="other_expense_description">Description</label> <span class="text-danger"><b>*</b></span>
                                                <textarea name="other_expense_description" class="form-control" cols="10" rows="1">{{$otherExpense->other_expense_description}}</textarea>
                                                <p class="text-danger pt-2">{{$errors->has('other_expense_description') ? $errors->first('other_expense_description') : ''}}</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="other_expense_amount">Other Expense Amount</label> <span class="text-danger"><b>*</b></span>
                                                <input name="other_expense_amount" value="{{$otherExpense->other_expense_amount}}" type="number" class="form-control" id="other_expense_amount">
                                                <p class="text-danger pt-2">{{$errors->has('other_expense_amount') ? $errors->first('other_expense_amount') : ''}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Update Other Expence</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection