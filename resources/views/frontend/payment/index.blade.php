@extends('frontend.master')

@section('title')
    Payment
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <table id="example" class="table display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Meal Cost</th>
                    <th scope="col">Service Charge</th>
                    <th scope="col">Worker Charge</th>
                    <th scope="col">Seat Rent</th>
                    <th scope="col">Payable Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>January 2024</td>
                    <td>2600 &#2547;</td>
                    <td>400 &#2547;</td>
                    <td>2200 &#2547;</td>
                    <td>2500 &#2547;</td>
                    <td>7000 &#2547;</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection