@extends('backend.master')

@section('title')
    Manage Employee
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
                            <h1 class="page-title">Show Employee</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show Employee</li>
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
                                        <h3 class="card-title">Employee Information</h3>
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
                                                        <th>Employee Name</th>
                                                        <td>{{ $employee->employee_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Working Area</th>
                                                        <td>{{ $employee->working_area }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mobile</th>
                                                        <td>{{ $employee->employee_mobile }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Voter ID</th>
                                                        <td>{{ $employee->employee_voter_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{ $employee->employee_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Employee Image</th>
                                                        <td>
                                                            <img src="{{ asset($employee->employee_image) }}" height="70px"
                                                                width="70px" alt="employee_image">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a href="{{route('employee.manage')}}">
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
