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
                    @foreach($member->meal as $meal)
                        <tr>
                            <td>{{ $meal->month_year }}</td>
                            <td>{{ $meal->total_meal }}</td>
                            <td>
                                @php
                                    $payment = $member->payments->where('month_year', $meal->month_year)->first();
                                @endphp
                                @if ($payment)
                                    {{ $payment->meal_rate }} &#2547;
                                @else
                                    N/A
                                @endif
                            </td>
                            {{-- <td>{{ $meal->meal_expense }} &#2547;</td> --}}
                            <td>
                                @php
                                    $payment = $member->payments->where('month_year', $meal->month_year)->first();
                                @endphp
                                @if ($payment)
                                    {{ $payment->meal_expense }} &#2547;
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection