@extends('frontend.master')

@section('title')
    Service
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <div class="card p-5">
                <table id="example" class="table display nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th scope="col">Month</th>
                        <th scope="col">Service</th>
                        <th scope="col">Other</th>
                        <th scope="col">Per Head</th>
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
                                <td>
                                    <ul>
                                        <li>Electricity: {{number_format($payment->electric_bill)}} &#2547;</li>
                                        <li>Water: {{number_format($payment->water_bill)}} &#2547;</li>
                                        <li>Gas: {{number_format($payment->gas_bill)}} &#2547;</li>
                                        <li>Internet: {{number_format($payment->internet_bill)}} &#2547;</li>
                                        <li>Dish: {{number_format($payment->dish_bill)}} &#2547;</li>
                                        <hr>
                                        <li>Total: {{number_format($payment->total_bill)}} &#2547;</li>
                                    </ul>
                                </td>
                                <td>{{number_format($payment->other_expense)}} &#2547;</td>
                                <td>({{number_format($payment->total_bill)}} + {{number_format($payment->other_expense)}}) / {{$payment->total_members}} = {{number_format($payment->service_charge)}} &#2547;</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
@endsection