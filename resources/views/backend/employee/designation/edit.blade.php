@extends('backend.master')

@section('title')
    Edit Designation
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
                                <li class="breadcrumb-item active" aria-current="page">Edit Designation</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Edit Designation</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <form class="needs-validation" action="{{route('designation.update', [$designation->id])}}" method="POST" novalidate>
                                        @csrf
                                        <h6 class="text-center"><i>Designation INFO</i></h6>
                                        <br><br>
                                        <div class="form-row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="designation_name">Designation Name</label> <span class="text-danger"><b>*</b></span>
                                                <input name="designation_name" value="{{$designation->designation_name}}" type="text" class="form-control" id="designation_name">
                                                <p class="text-danger pt-2">{{$errors->has('designation_name') ? $errors->first('designation_name') : ''}}</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                                <label for="designation_salary">Designation Salary</label> <span class="text-danger"><b>*</b></span>
                                                <input name="designation_salary" value="{{$designation->designation_salary}}" type="number" class="form-control" id="designation_salary">
                                                <p class="text-danger pt-2">{{$errors->has('designation_salary') ? $errors->first('designation_salary') : ''}}</p>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Update Designation</button>
                                        <a href="{{route('designation.add')}}">
                                            <input type="button" class="btn btn-danger" value="cancel">
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
