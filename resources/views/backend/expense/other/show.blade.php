@extends('backend.master')

@section('title')
    Show Other Expense
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
                            <h1 class="page-title">Show Other Expense</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Other Expense</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Other Expense</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h3 class="card-title">Other Expense Information</h3>
                                    </div>
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('msg') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="editable-responsive-table"
                                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                <tbody>
                                                    <tr>
                                                        <th>Date</th>
                                                        <td>{{ $otherExpense->month_year }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Description</th>
                                                        <td>{{ $otherExpense->other_expense_description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Expense Amount</th>
                                                        <td>{{ $otherExpense->other_expense_amount }} &#2547;</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <a href="{{route('otherExpense.manage')}}">
                                                <input type="button" class="btn btn-danger" value="Go back">
                                            </a>
                                        </div>
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
