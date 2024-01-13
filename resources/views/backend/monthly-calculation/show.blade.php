@extends('backend.master')

@section('title')
    Show calculaton
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
                            <h1 class="page-title">Show calculaton</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">calculaton</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show calculaton</li>
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
                                        <div class="table-responsive mt-5">
                                            <table id="editable-responsive-table"
                                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                <tbody>
                                                    <tr>
                                                        <th>Total Bill & Other on {{Carbon\Carbon::parse($selectedMonthYear)->format('F Y')}}</th>
                                                        <td>{{number_format(json_decode($totalBill)->total_bill)}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Employee Salary on {{Carbon\Carbon::parse($selectedMonthYear)->format('F Y')}}</th>
                                                        <td>{{number_format(json_decode($employeeSalary)->employee_salary)}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Toral Room Rent on {{Carbon\Carbon::parse($selectedMonthYear)->format('F Y')}}</th>
                                                        <td>{{number_format($totalRoomRentForTheMonth)}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>{{number_format(json_decode($totalBill)->total_bill + json_decode($employeeSalary)->employee_salary + $totalRoomRentForTheMonth)}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Meal Balance</th>
                                                        <td>{{number_format($totalMealBalance)}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Amount to Collect</th>
                                                        <td>{{number_format((json_decode($totalBill)->total_bill + json_decode($employeeSalary)->employee_salary + $totalRoomRentForTheMonth) - $totalMealBalance)}} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Amount Collected</th>
                                                        <td>{{number_format($totalCollectedPayment)}} &#2547;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a href="#">
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
