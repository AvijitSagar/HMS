@extends('backend.master')

@section('title')
    Manage Payments
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
                            <h1 class="page-title">Manage Payments</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Payments</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Payments</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Payments</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Date</th>
                                                    <th class="border-bottom-0">Member</th>
                                                    <th class="border-bottom-0">Payable Amount</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>
                                                            <?php
                                                                $date = DateTime::createFromFormat('Y-m', $payment->month_year);
                                                                echo $date->format('F Y');
                                                            ?>
                                                        </td>
                                                        <td>{{$payment->member->member_first_name . ' ' . $payment->member->member_last_name}}</td>
                                                        <td>{{$payment->payable_amount}} &#2547;</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('payment.show', [$payment->id])}}"
                                                                    class="btn btn-success">
                                                                    <i class="fe fe-book-open"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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
