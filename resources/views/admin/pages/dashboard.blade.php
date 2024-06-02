@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Counters</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .counter-container {
            flex: 0 0 calc(25% - 20px);
            color: #fff;
            font-size: 16px;
            padding: 10px;
            box-sizing: border-box;
            background-color: #007bff;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .counter-container .fa {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .mu-counter-name {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .counter-value {
            font-size: 24px;
            font-weight: bold;
        }

        @media(max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .counter-container {
                flex: 0 0 calc(50% - 20px);
            }
        }

    </style>
</head>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome Lana</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January - March</a>
                                <a class="dropdown-item" href="#">March - June</a>
                                <a class="dropdown-item" href="#">June - August</a>
                                <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card tale-bg">
                    <div class="card-people mt-auto">
                        <img src="{{ asset('admin/images/dashboard/people.svg') }}" alt="people" class="img-fluid" style="max-width: 200px;">
                        <div class="weather-info">
                            <div class="d-flex">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Jember</h4>
                                    <h6 class="font-weight-normal">Indonesia</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="counter-container">
                <section class="mu-counter-area">
                    <div class="mu-counter-block">
                        <div class="mu-single-counter">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <div class="counter-value" data-count="4">{{ $jumlah_kategori }}</div>
                            <h5 class="mu-counter-name">Jenis Buku</h5>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="col-md-3">
            <div class="counter-container">
                <section class="mu-counter-area">
                    <div class="mu-counter-block">
                        <div class="mu-single-counter">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <div class="counter-value" data-count="650">{{ $jumlah_buku }}</div>
                            <h5 class="mu-counter-name">Total Buku</h5>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="col-md-3">
            <div class="counter-container">
                <section class="mu-counter-area">
                    <div class="mu-counter-block">
                        <div class="mu-single-counter">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <div class="counter-value" data-count="1055">{{ $jumlah_user }}</div>
                            <h5 class="mu-counter-name">Users</h5>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="col-md-3">
            <div class="counter-container">
                <section class="mu-counter-area">
                    <div class="mu-counter-block">
                        <div class="mu-single-counter">
                            <i class="fa fa-history" aria-hidden="true"></i>
                            <div class="counter-value" data-count="25">{{ $total_peminjaman }}</div>
                            <h5 class="mu-counter-name">Total Peminjaman</h5>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Order Details</p>
                {{-- <div class="d-flex flex-wrap mb-5">
                    <div class="mr-5 mt-3">
                        <p class="text-muted">Order value</p>
                        <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                    </div>
                    <div class="mr-5 mt-3">
                        <p class="text-muted">Orders</p>
                        <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                    </div>
                    <div class="mr-5 mt-3">
                        <p class="text-muted">Users</p>
                        <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                    </div>
                    <div class="mt-3">
                        <p class="text-muted">Downloads</p>
                        <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                    </div>
                </div> --}}
                <canvas id="order-chart-2"></canvas>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-4 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Notifications</p>
                <ul class="icon-data-list">
                    <li>
                        <div class="d-flex">
                            <img src="{{ asset('admin/images/faces/face1.jpg') }}" alt="user">
    <div>
        <p class="text-info mb-1">Isabella Becker</p>
        <p class="mb-0">Sales dashboard have been created</p>
        <small>9:30 am</small>
    </div>
</div>
</li>
<li>
    <div class="d-flex">
        <img src="{{ asset('admin/images/faces/face2.jpg') }}" alt="user">
        <div>
            <p class="text-info mb-1">Adam Warren</p>
            <p class="mb-0">You have done a great job #TW111</p>
            <small>10:30 am</small>
        </div>
    </div>
</li>
<li>
    <div class="d-flex">
        <img src="{{ asset('admin/images/faces/face3.jpg') }}" alt="user">
        <div>
            <p class="text-info mb-1">Leonard Thornton</p>
            <p class="mb-0">Sales dashboard have been created</p>
            <small>11:30 am</small>
        </div>
    </div>
</li>
<li>
    <div class="d-flex">
        <img src="{{ asset('admin/images/faces/face4.jpg') }}" alt="user">
        <div>
            <p class="text-info mb-1">George Morrison</p>
            <p class="mb-0">Sales dashboard have been created</p>
            <small>8:50 am</small>
        </div>
    </div>
</li>
<li>
    <div class="d-flex">
        <img src="{{ asset('admin/images/faces/face5.jpg') }}" alt="user">
        <div>
            <p class="text-info mb-1">Ryan Cortez</p>
            <p class="mb-0">Herbs are fun and easy to grow.</p>
            <small>9:00 am</small>
        </div>
    </div>
</li>
</ul>
</div>
</div>
</div> --}}

</div>



@endsection

@section('script')

<script>
    $("#order-chart").length
        var areaData = {
            labels: {!! json_encode($daysOfWeek) !!}
            , datasets: [{
                    data: {!! json_encode($pinjamanPerHariOrdered) !!}
                    , borderColor: ["#4747A1"]
                    , borderWidth: 2
                    , fill: false
                    , label: "Orders"
                , }

            , ]
        , };
        var areaOptions = {
            responsive: true
            , maintainAspectRatio: true
            , plugins: {
                filler: {
                    propagate: false
                , }
            , }
            , scales: {
                xAxes: [{
                    display: true
                    , ticks: {
                        display: true
                        , padding: 10
                        , fontColor: "#6C7383"
                    , }
                    , gridLines: {
                        display: false
                        , drawBorder: false
                        , color: "transparent"
                        , zeroLineColor: "#eeeeee"
                    , }
                , }, ]
                , yAxes: [{
                    display: true
                    , ticks: {
                        display: true
                        , autoSkip: false
                        , maxRotation: 0
                        , stepSize: 200
                        , min: 200
                        , max: 1200
                        , padding: 18
                        , fontColor: "#6C7383"
                    , }
                    , gridLines: {
                        display: true
                        , color: "#f2f2f2"
                        , drawBorder: false
                    , }
                , }, ]
            , }
            , legend: {
                display: false
            , }
            , tooltips: {
                enabled: true
            , }
            , elements: {
                line: {
                    tension: 0.35
                , }
                , point: {
                    radius: 0
                , }
            , }
        , };
        var revenueChartCanvas = $("#order-chart-2").get(0).getContext("2d");
        var revenueChart = new Chart(revenueChartCanvas, {
            type: "line"
            , data: areaData
            , options: areaOptions
        , });

</script>


@if(Session::get('login'))
<script>
    // tidak usah tombol oke, berikan waktu 1 detik
    Swal.fire({
        icon: 'success'
        , title: 'Login Berhasil'
        , text: 'Selamat Datang'
        , showConfirmButton: false
        , timer: 1000
    , });

</script>
@endif
@endsection
