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
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>January 2024</td>
                    <td>
                        <ul>
                            <li>Electricity:</li>
                            <li>Water:</li>
                            <li>Gas:</li>
                            <li>Internet:</li>
                            <li>Dish:</li>
                            <hr>
                            <li>Total:</li>
                        </ul>
                    </td>
                    <td>40 &#2547;</td>
                    <td>2200 &#2547;</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection