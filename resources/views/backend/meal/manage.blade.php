@extends('backend.master')

@section('title')
    Manage Meal Record
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
                            <h1 class="page-title">Manage Meal Record</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Meal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Meal Record</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Meal Record</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Member Name</th>
                                                    <th class="border-bottom-0">Month & Year</th>
                                                    <th class="border-bottom-0">Total Meal</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($meals as $meal)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $meal->member->member_first_name . ' ' . $meal->member->member_last_name }}</td>
                                                        {{-- <td>{{ $meal->month_year }}</td> --}}
                                                        <td>
                                                            <?php
                                                                $date = DateTime::createFromFormat('Y-m', $meal->month_year);
                                                                echo $date->format('F Y');
                                                            ?>
                                                        </td>
                                                        <td>{{ $meal->total_meal }}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('meal.edit', [$meal->id])}}"
                                                                    class="btn btn-warning">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <form action="{{route('meal.delete', [$meal->id])}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fe fe-trash"></i>
                                                                    </button>
                                                                </form>
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
