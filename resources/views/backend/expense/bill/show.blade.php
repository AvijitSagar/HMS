@extends('backend.master')

@section('title')
    Show Bill
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
                            <h1 class="page-title">Show Bill</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Bill</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Bill</li>
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
                                        <h3 class="card-title">Bill Information</h3>
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
                                                        <td>
                                                            <?php
                                                                $date = DateTime::createFromFormat('Y-m', $bill->month_year);
                                                                echo $date->format('F Y');
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Electric Bill</th>
                                                        <td>{{ $bill->electric_bill }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gas Bill</th>
                                                        <td>{{ $bill->gas_bill }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Water Bill</th>
                                                        <td>{{ $bill->water_bill }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Internet Bill</th>
                                                        <td>{{ $bill->internet_bill }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Dish Bill</th>
                                                        <td>{{ $bill->dish_bill }} &#2547;</td>
                                                    </tr>
                                                    @php
                                                        $total = $bill->electric_bill + $bill->gas_bill + $bill->water_bill + $bill->internet_bill + $bill->dish_bill
                                                    @endphp
                                                    <tr>
                                                        <th><b>Total bill expense for {{ $date->format('F Y') }}</b></th>
                                                        <td class="text-danger"><b>{{ $total }} &#2547;</b></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <a href="{{route('bill.manage')}}">
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
