@extends('backend.master')

@section('title')
    Home
@endsection

@section('content')
    <section>
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">


                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Dashboard</h1>
                        </div>
                        <div class="ms-auto pageheader-btn">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    <!-- ROW-1 -->
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{count($totalRooms)}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Seats</strong></p>
                                            <p class="text-danger mb-0 mt-2 fs-12">Booked: {{count($bookedRooms)}}</p>
                                            <p class="text-success mb-0 mt-2 fs-12">Available: {{count($availableRooms)}}</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-info dash ms-auto box-shadow-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{count($allMembers)}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Members</strong></p>
                                            <p class="text-danger mb-0 mt-2 fs-12">On Leave: {{count($membersOnLeave)}}</p>
                                            <p class="text-success mb-0 mt-2 fs-12">In Hostel: {{count($membersInHostel)}}</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{count($allEmployees)}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Employees</strong></p>
                                            <p class="text-danger mb-0 mt-2 fs-12">On leave: {{count($employeesOnLeave)}}</p>
                                            <p class="text-success mb-0 mt-2 fs-12">On Duty: {{count($employeesInhostel)}}</p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">{{$totalMealsPreviousMonth}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Meals</strong></p>
                                            <p class="text-warning fs-13 mb-0"><strong>Previous Month</strong></p>
                                            <p class="mb-0 mt-2 fs-12">
                                                <?php
                                                    $date = DateTime::createFromFormat('Y-m', $previousMonth);
                                                    echo $date->format('F Y');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-info dash ms-auto box-shadow-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M61.1 224C45 224 32 211 32 194.9c0-1.9 .2-3.7 .6-5.6C37.9 168.3 78.8 32 256 32s218.1 136.3 223.4 157.3c.5 1.9 .6 3.7 .6 5.6c0 16.1-13 29.1-29.1 29.1H61.1zM144 128a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zm240 16a16 16 0 1 0 0-32 16 16 0 1 0 0 32zM272 96a16 16 0 1 0 -32 0 16 16 0 1 0 32 0zM16 304c0-26.5 21.5-48 48-48H448c26.5 0 48 21.5 48 48s-21.5 48-48 48H64c-26.5 0-48-21.5-48-48zm16 96c0-8.8 7.2-16 16-16H464c8.8 0 16 7.2 16 16v16c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V400z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">&#2547; {{$mealRatePreviousMonth}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Meal Rate</strong></p>
                                            <p class="text-warning fs-13 mb-0"><strong>Previous Month</strong></p>
                                            <p class="mb-0 mt-2 fs-12">
                                                <?php
                                                    $date = DateTime::createFromFormat('Y-m', $previousMonth);
                                                    echo $date->format('F Y');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-success dash ms-auto box-shadow-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">&#2547; {{$totalGroceryPreviousMonth}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Grocery</strong></p>
                                            <p class="text-warning fs-13 mb-0"><strong>Previous Month</strong></p>
                                            <p class="mb-0 mt-2 fs-12">
                                                <?php
                                                    $date = DateTime::createFromFormat('Y-m', $previousMonth);
                                                    echo $date->format('F Y');
                                                ?>
                                            </p>
                                            {{-- <p class="text-success mb-0 mt-2 fs-12">On Duty: {{count($employeesInhostel)}}</p> --}}
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">&#2547; {{number_format($totalGroceryCurrentMonth)}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Grocery</strong></p>
                                            <p class="text-primary fs-13 mb-0"><strong>This Month</strong></p>
                                            <p class="mb-0 mt-2 fs-12">
                                                <?php
                                                    $date = DateTime::createFromFormat('Y-m', $currentMonth);
                                                    echo $date->format('F Y');
                                                ?>
                                            </p>
                                            {{-- <p class="text-success mb-0 mt-2 fs-12">On Duty: {{count($employeesInhostel)}}</p> --}}
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">&#2547; {{number_format($totalBillsPreviousMonth)}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Bill & Other</strong></p>
                                            <p class="text-danger fs-13 mb-0"><strong>Previous Month</strong></p>
                                            <p class="mb-0 mt-2 fs-12">
                                                <?php
                                                    $date = DateTime::createFromFormat('Y-m', $previousMonth);
                                                    echo $date->format('F Y');
                                                ?>
                                            </p>
                                            {{-- <p class="text-success mb-0 mt-2 fs-12">On Duty: {{count($employeesInhostel)}}</p> --}}
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="mb-2 fw-semibold">&#2547; {{number_format($totalSeatRentPreviousMonth)}}</h3>
                                            <p class="text-muted fs-13 mb-0"><strong>Total Seat Rent</strong></p>
                                            <p class="text-danger fs-13 mb-0"><strong>Previous Month</strong></p>
                                            <p class="mb-0 mt-2 fs-12">
                                                <?php
                                                    $date = DateTime::createFromFormat('Y-m', $previousMonth);
                                                    echo $date->format('F Y');
                                                ?>
                                            </p>
                                            {{-- <p class="text-success mb-0 mt-2 fs-12">On Duty: {{count($employeesInhostel)}}</p> --}}
                                        </div>
                                        <div class="col col-auto top-icn dash">
                                            <div class="counter-icon bg-primary dash ms-auto box-shadow-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zM272 192H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16s7.2-16 16-16zM256 304c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H272c-8.8 0-16-7.2-16-16zM164 152v13.9c7.5 1.2 14.6 2.9 21.1 4.7c10.7 2.8 17 13.8 14.2 24.5s-13.8 17-24.5 14.2c-11-2.9-21.6-5-31.2-5.2c-7.9-.1-16 1.8-21.5 5c-4.8 2.8-6.2 5.6-6.2 9.3c0 1.8 .1 3.5 5.3 6.7c6.3 3.8 15.5 6.7 28.3 10.5l.7 .2c11.2 3.4 25.6 7.7 37.1 15c12.9 8.1 24.3 21.3 24.6 41.6c.3 20.9-10.5 36.1-24.8 45c-7.2 4.5-15.2 7.3-23.2 9V360c0 11-9 20-20 20s-20-9-20-20V345.4c-10.3-2.2-20-5.5-28.2-8.4l0 0 0 0c-2.1-.7-4.1-1.4-6.1-2.1c-10.5-3.5-16.1-14.8-12.6-25.3s14.8-16.1 25.3-12.6c2.5 .8 4.9 1.7 7.2 2.4c13.6 4.6 24 8.1 35.1 8.5c8.6 .3 16.5-1.6 21.4-4.7c4.1-2.5 6-5.5 5.9-10.5c0-2.9-.8-5-5.9-8.2c-6.3-4-15.4-6.9-28-10.7l-1.7-.5c-10.9-3.3-24.6-7.4-35.6-14c-12.7-7.7-24.6-20.5-24.7-40.7c-.1-21.1 11.8-35.7 25.8-43.9c6.9-4.1 14.5-6.8 22.2-8.5V152c0-11 9-20 20-20s20 9 20 20z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ROW-1 END-->
                </div>
            </div>
        </div>
    </section>
@endsection
