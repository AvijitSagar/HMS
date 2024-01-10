@extends('frontend.master')

@section('title')
    Payment
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <div class="card p-5">
               <table id="example" class="table display nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">Month</th>
                        <th scope="col">Meal Balance</th>
                        <th scope="col">Service Charge</th>
                        <th scope="col">Worker Charge</th>
                        <th scope="col">Seat Rent</th>
                        <th scope="col">Payable Amount</th>
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
                                <td class="{{($payment->meal_balance)< 0 ? 'text-danger' : ''}}">{{number_format($payment->meal_balance)}} &#2547;</td>
                                <td>{{number_format($payment->service_charge)}} &#2547;</td>
                                <td>{{number_format($payment->member_wise_employee_salary)}} &#2547;</td>
                                <td>{{number_format($payment->seat_rent)}} &#2547;</td>
                                <td>{{number_format($payment->payable_amount)}} &#2547;</td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                </table> 
            </div>
            
        </div>
    </main>
@endsection