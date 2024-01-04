@extends('backend.master')

@section('title')
    Show Payment
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
                            <h1 class="page-title">Show Payment</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Payment</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Payment</li>
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
                                        <h3 class="card-title">Payment Information of {{$payment->member->member_first_name . ' ' . $payment->member->member_last_name}}. <?php $date = DateTime::createFromFormat('Y-m', $payment->month_year); echo $date->format('F Y'); ?></h3>
                                    </div>
                                    <div>
                                        <h5 class="mt-3 text-center text-success">{{ Session::get('msg') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <span>Electricicy : {{number_format($payment->electric_bill)}} &#2547;</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>Gas : {{number_format($payment->gas_bill)}} &#2547;</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>Water : {{number_format($payment->water_bill)}} &#2547;</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>Internet : {{number_format($payment->internet_bill)}} &#2547;</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>Dish : {{number_format($payment->dish_bill)}} &#2547;</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>Other : {{number_format($payment->other_expense)}} &#2547;</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>Total : {{number_format($payment->total_bill)}} &#2547;</span>
                                        <div class="table-responsive mt-5">
                                            <table id="editable-responsive-table"
                                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                <tbody>
                                                    <tr>
                                                        <th>Date</th>
                                                        <td>
                                                            <?php
                                                                $date = DateTime::createFromFormat('Y-m', $payment->month_year);
                                                                echo $date->format('F Y');
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Member Name</th>
                                                        <td>{{$payment->member->member_first_name . ' ' . $payment->member->member_last_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Meal</th>
                                                        <td>{{ $payment->total_meal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Meal Rate of The Month</th>
                                                        <td>{{ number_format($payment->meal_rate) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Meal Expense</th>
                                                        <td>{{ $payment->total_meal . ' x ' . number_format($payment->meal_rate) . ' = ' . number_format($payment->meal_expense) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Meal Deposit</th>
                                                        <td>{{ number_format($payment->meal_deposit) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Meal Balance</th>
                                                        <td class="{{$payment->meal_balance < 0 ? 'text-danger' : ''}}">{{ number_format($payment->meal_deposit) . ' - ' . number_format($payment->meal_expense) . ' = ' . number_format($payment->meal_balance) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Service Charge of The Month</th>
                                                        <td>{{ number_format($payment->service_charge) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Seat Rent</th>
                                                        <td>{{ number_format($payment->seat_rent) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Employee Salary</th>
                                                        <td>{{ number_format($payment->employee_salary) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Member Wise Employee Salary</th>
                                                        <td>{{ number_format($payment->employee_salary) . ' / ' . $payment->total_members . ' = ' . number_format($payment->member_wise_employee_salary) }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Amount to Pay</th>
                                                        <td>{{ '(' . number_format($payment->seat_rent) . ' + ' . number_format($payment->service_charge) . ' + ' . number_format($payment->member_wise_employee_salary) . ')' . ' - ' . '(' . number_format($payment->meal_balance) . ')' . ' = ' . number_format($payment->payable_amount)}} &#2547;</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <a href="{{route('payment.manage')}}">
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
