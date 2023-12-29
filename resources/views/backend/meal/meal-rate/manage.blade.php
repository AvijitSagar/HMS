@extends('backend.master')

@section('title')
    Manage Meal Rates
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
                            <h1 class="page-title">Manage Meal Rates</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Meal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Meal Rates</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Meal Rates</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Month & Year</th>
                                                    <th class="border-bottom-0">Meal Rate</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($mealRates as $mealRate)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $mealRate->month_year }}</td>
                                                        
                                                        <td>{{ $mealRate->meal_rate }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('meal-rate.show', [$mealRate->id])}}" class="btn btn-success">
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
