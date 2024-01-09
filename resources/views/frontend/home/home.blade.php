@extends('frontend.master')

@section('title')
    Home
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <table id="" class="table">
                <tbody>
                    <tr>
                        <th>Member Name:</th>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <th>Member Since:</th>
                        <td>{{Auth::user()->created_at->format('F Y')}}</td>
                    </tr>
                    <tr>
                        <th>Seat:</th>
                        <td>{{$member->seat->room->floor . $member->seat->room->room . $member->seat->room->seat}}</td>
                    </tr>
                    
                    <tr>
                        <th>Amount to pay ({{Carbon\Carbon::now()->format('F Y')}})</th>
                        <td>
                            <?php 
                                if($amountToPay == null){
                                    echo 'Not yet calculated for current month';
                                }else {
                                    echo($amountToPay->payable_amount);
                                }
                            ?>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </main>
    <!-- main end -->
@endsection