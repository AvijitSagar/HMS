@include('frontend.master')

@section('title')
    Seat
@endsection

@section('content')
    <main>
        <div class="container mt-5">
            <table id="example" class="table display nowrap" style="width:100%">
                <thead>
                <tr>
                    <th scope="col">Seat</th>
                    <th scope="col">Rent</th>
                    <th scope="col">Allocation Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>101A</td>
                    <td>2500 &#2547;</td>
                    <td>5 january 2024</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection