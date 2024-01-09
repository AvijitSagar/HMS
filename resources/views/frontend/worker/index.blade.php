@extends('frontend.master')

@section('title')
    Worker
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <table id="example" class="table display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Total Worker Salary</th>
                    <th scope="col">Perhead Charge</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($member->payments as $payment)
                        <tr>
                            <td>
                                <?php
                                    $date = DateTime::createFromFormat('Y-m', $payment->month_year);
                                    echo $date->format('F Y');
                                ?>
                            </td>
                            <td>{{number_format($payment->employee_salary)}} / {{$payment->total_members}}</td>
                            <td>{{number_format($payment->member_wise_employee_salary)}} &#2547;</td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection