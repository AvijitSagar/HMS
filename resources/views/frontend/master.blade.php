<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css">

    <!-- responsive data table  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
</head>

<body>
    {{-- app header  --}}
    @include('frontend.common.header')

    {{-- app content  --}}
    @yield('content')

    {{-- app footer  --}}
    @include('frontend.common.footer')

    <script src="{{ asset('/') }}frontend/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}frontend/assets/js/all.min.js"></script>

    <!-- responsive data table  -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script src="{{ asset('/') }}frontend/assets/js/script.js"></script>
</body>

</html>
