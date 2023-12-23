@extends('backend.master')

@section('title')
    Manage Employees
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
                            <h1 class="page-title">Manage Employees</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Employees</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Manage Employees</h3>
                                </div>
                                <div class="card-body">
                                    <p class="text-center text-success">{{ Session::get('msg') }}</p>
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">SL</th>
                                                    <th class="border-bottom-0">Name</th>
                                                    <th class="border-bottom-0">Designation</th>
                                                    <th class="border-bottom-0">Mobile</th>
                                                    <th class="border-bottom-0">Salary</th>
                                                    <th class="border-bottom-0">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $employee)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $employee->employee_name }}</td>
                                                        <td>{{ $employee->employeeDesignation->designation_name }}</td>
                                                        <td>{{ $employee->employee_mobile }}</td>
                                                        <td>{{ $employee->employeeDesignation->designation_salary }} &#2547;</td>
                                                        {{-- <td class="{{$employee->status == 1 ? 'text-success' : 'text-danger'}}">
                                                            {{ $employee->status == 1 ? 'Active' : 'Inactive' }}
                                                        </td> --}}
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('employee.show', [$employee->id])}}"
                                                                    class="btn btn-success">
                                                                    <i class="fe fe-book-open"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <a href="{{route('employee.edit', [$employee->id])}}"
                                                                    class="btn btn-warning">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                                &nbsp;&nbsp;
                                                                <form action="{{route('employee.delete', [$employee->id])}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete employee {{$employee->employee_name}} ?')">
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
