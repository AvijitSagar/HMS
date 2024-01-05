@extends('frontend.master')

@section('title')
    Meal
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <table id="example" class="table display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Total Meal</th>
                    <th scope="col">Meal Rate</th>
                    <th scope="col">Meal Cost</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>January 2024</td>
                    <td>55</td>
                    <td>40 &#2547;</td>
                    <td>2200 &#2547;</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection