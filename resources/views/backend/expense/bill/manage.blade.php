@extends('backend.master')

@section('title')
    Manage Bills
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
                            <h1 class="page-title">Manage Bills</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Bills</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Bills</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Bills</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Date</th>
                                                    <th class="border-bottom-0">Electric bill</th>
                                                    <th class="border-bottom-0">Gas Bill</th>
                                                    <th class="border-bottom-0">Water Bill</th>
                                                    <th class="border-bottom-0">Internet Bill</th>
                                                    <th class="border-bottom-0">Dish Bill</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bills as $bill)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <?php
                                                                $date = DateTime::createFromFormat('Y-m', $bill->month_year);
                                                                echo $date->format('F Y');
                                                            ?>
                                                        </td>
                                                        <td>{{ $bill->electric_bill }} &#2547;</td>
                                                        <td>{{ $bill->gas_bill}} &#2547;</td>
                                                        <td>{{ $bill->water_bill}} &#2547;</td>
                                                        <td>{{ $bill->internet_bill}} &#2547;</td>
                                                        <td>{{ $bill->dish_bill}} &#2547;</td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('bill.show', [$bill->id])}}"
                                                                    class="btn btn-primary">
                                                                    <i class="fe fe-book-open"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <a href="{{route('bill.edit', [$bill->id])}}"
                                                                    class="btn btn-warning">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <form action="{{route('bill.delete', [$bill->id])}}"
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
