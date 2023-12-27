@extends('backend.master')

@section('title')
    Manage Grocery
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
                            <h1 class="page-title">Manage Grocery</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Grocery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Grocery</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Grocery</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Date</th>
                                                    <th class="border-bottom-0">Expense</th>
                                                    {{-- <th class="border-bottom-0">Description</th> --}}
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($groceries as $grocery)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $grocery->grocery_date }}</td>
                                                        <td>{{ $grocery->grocery_expense }} &#2547;</td>
                                                        {{-- <td>{!! Str::limit($grocery->grocery_description, 20, '...') !!}</td> --}}
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('grocery.show', [$grocery->id])}}"
                                                                    class="btn btn-primary">
                                                                    <i class="fe fe-book-open"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <a href="{{route('grocery.edit', [$grocery->id])}}"
                                                                    class="btn btn-warning">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <form action="{{route('grocery.delete', [$grocery->id])}}"
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
