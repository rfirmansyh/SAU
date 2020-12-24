@extends('_layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item">Activities</div>
@endsection
@section('content-header')
  <h2 class="section-title">Rincian Data Terbaru</h2>
@endsection

@section('content')
    {{-- widget --}}
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Auditor</h4>
                </div>
                <div class="card-body">
                    {{ $auditor_total }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Unit Kerja</h4>
                </div>
                <div class="card-body">
                    {{ $unitkerja_total }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Kertas Kerja</h4>
                </div>
                <div class="card-body">
                    {{ $kertaskerja_total }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="far fa-file-alt"></i>
            </div>
            <div class="card-wrap">
            <div class="card-header">
                <h4>DTM</h4>
            </div>
            <div class="card-body">
                {{ $dtm_total }}
            </div>
            </div>
        </div>
        </div>
    </div>
    {{-- end of widget --}}

    {{-- statistic chart --}}
    <div class="card">
        <div class="card-header">
            <h4>Statistikk Banyaknya Unit Kerja Audit</h4>
        </div>
        <div class="card-body">
            <div class="chart-container">
                <canvas id="dashboard-chart" height="182"></canvas>
            </div>
        </div>
    </div>
    {{-- end of statistic chart --}}
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    
    <script>
        var datasets = JSON.parse('{!! json_encode($kertaskerja_monthly) !!}');
        console.log(datasets);

        var statistics_chart = document.getElementById("dashboard-chart").getContext('2d');

        var myChart = new Chart(statistics_chart, {
            type: 'line',
            data: {
                labels: datasets.map(data => data.month_year),
                datasets: [{
                    label: 'Statistics',
                    data: datasets.map(data => data.total),
                    borderWidth: 5,
                    borderColor: '#6777ef',
                    backgroundColor: 'transparent',
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6777ef',
                    pointRadius: 4
                }]
            },
            options: {
                stacked: false,
                legend: {
                    display: false
                },
                scales: {
                    beginAtZero: true,
                    xAxes: [{
                        scaleLabel: {
							display: true,
							labelString: 'Bulan'
						},
                        display: true,
                        gridLines: {
                            color: '#fbfbfb',
                            lineWidth: 2
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            drawBorder: false,
                        },
                        ticks: {
                            stepSize: 1,
                            beginAtZero: true
                        },
                        scaleLabel: {
							display: true,
							labelString: 'Jumlah Kertas kerja'
						}
                    }],
                },
            }
        });
    </script>
@endsection

{{-- scales: {
    beginAtZero: true,
    xAxes: [{
    display: true,
    scaleLabel: {
        display: true,
        labelString: 'Month'
    }
    }],
    yAxes: [{
        display: true,
        scaleLabel: {
            display: true,
            labelString: 'Rp..'
        },
    }]
} --}}