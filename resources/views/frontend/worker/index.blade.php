@include('frontend.master')

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
                    <th scope="col">Worker Salary</th>
                    <th scope="col">Worker Charge</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>January 2024</td>
                    <td>
                        <ul>
                            <li>worker 1:</li>
                            <li>worker 2:</li>
                            <li>worker 3:</li>
                            <hr>
                            <li>Total:</li>
                        </ul>
                    </td>
                    <td>4000 &#2547;</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection