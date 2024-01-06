@extends('frontend.master')

@section('title')
    Service
@endsection

@section('content')
    <main>
        <div class="container mt-5">
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
                            <td>{{$payment->month_year}}</td>
                            <td>
                                <ul>
                                    <li>Electricity: {{$payment->electric_bill}}</li>
                                    <li>Water: {{$payment->water_bill}}</li>
                                    <li>Gas: {{$payment->gas_bill}}</li>
                                    <li>Internet: {{$payment->internet_bill}}</li>
                                    <li>Dish: {{$payment->dish_bill}}</li>
                                    <hr>
                                    <li>Total: {{$payment->total_bill}} / {{$payment->total_members}}</li>
                                </ul>
                            </td>
                            <td>{{$payment->other_expense}} &#2547;</td>
                            <td>{{$payment->service_charge}} &#2547;</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </main>
@endsection