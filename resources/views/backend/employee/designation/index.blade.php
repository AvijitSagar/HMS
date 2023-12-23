@extends('backend.master')

@section('title')
    Employee Designation
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
                            <h1 class="page-title">Employee</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Employee Designation</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Designation</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" action="" method="POST" novalidate>
                                        @csrf
                                        <h6 class="text-center"><i>Designation INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="designation_name">Designation Name</label> <span class="text-danger"><b>*</b></span>
                                                <input name="designation_name" type="text" class="form-control" id="designation_name" value="">
                                                <p class="text-danger pt-2">{{$errors->has('designation_name') ? $errors->first('designation_name') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="designation_salary">Designation Salary</label> <span class="text-danger"><b>*</b></span>
                                                <input name="designation_salary" type="number" class="form-control" id="designation_salary" value="">
                                                <p class="text-danger pt-2">{{$errors->has('designation_salary') ? $errors->first('designation_salary') : ''}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Add Designation</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title">Manage Designations</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                            <div class="table-responsive">
                                                <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-bottom-0">SL</th>
                                                            <th class="border-bottom-0">Designation</th>
                                                            <th class="border-bottom-0">Salary</th>
                                                            <th class="border-bottom-0">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($designations as $designation)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$designation->designation_name}}</td>
                                                                <td>{{$designation->designation_salary}} &#2547;</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="{{route('designation.edit', [$designation->id])}}"
                                                                            class="btn btn-success">
                                                                            <i class="fe fe-edit"></i>
                                                                        </a>
                                                                        &nbsp;&nbsp;
                                                                        <form action="{{route('designation.delete', [$designation->id])}}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete designation: {{$designation->designation_name}}..?')">
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
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
