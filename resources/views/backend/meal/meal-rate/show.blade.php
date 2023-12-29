@extends('backend.master')

@section('title')
    Show Meal Rate
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Meal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Meal Rate</li>
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
                                        <h3 class="card-title">Meal Rate Information</h3>
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
                                                        <th>Month & Year</th>
                                                        <td>
                                                            <?php
                                                                $date = DateTime::createFromFormat('Y-m', $mealRate->month_year);
                                                                echo $date->format('F Y');
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total meal of the month</th>
                                                        <td>{{ $mealRate->total_meal_of_the_month }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total grocery bill of the year</th>
                                                        <td>{{ $mealRate->total_grocery_of_the_month }} &#2547;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Meal Rate</th>
                                                        <td>{{ $mealRate->meal_rate }} &#2547;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a href="{{route('meal-rate.manage')}}">
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
