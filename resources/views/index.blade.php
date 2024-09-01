@extends('layouts.layout')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">ផ្ទាំគ្រប់គ្រង</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-12">

                <div class="small-box shadow rounded " style="border-bottom: 5px solid #17A2B8;">
                    <div class="inner">
                        <h3>{{ $totalMale }}</h3>
                        <p>ចំនួនប្រុស</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="small-box shadow rounded " style="border-bottom: 5px solid #17A2B8;">
                    <div class="inner">
                        {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                        <h3>{{ $totalFemale }}</h3>
                        <p>ចំនួនស្រី</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="small-box shadow rounded " style="border-bottom: 5px solid #17A2B8;">
                    <div class="inner">
                        <h3>{{ $totals }}</h3>

                        <p>ចំនួនសរុប</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="small-box shadow rounded " style="border-bottom: 5px solid #17A2B8;">
                    <div class="inner">
                        <h3>{{ $totalFamily }}</h3>

                        <p>ចំនួនគ្រួសារ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title text-white">របាយការណ៍</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="barChart" style="min-height: 400px; height: 400px; max-height: 500px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script src="{{asset('asset/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Page specific script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var barChartData = {
            labels: @json($chartData['labels']),
            datasets: [
                {
                    label: 'ប្រុស',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: @json($chartData['datasets']['male'])
                },
                {
                    label: 'ស្រី',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: @json($chartData['datasets']['female'])
                },
            ]
        }

        var barChartCanvas = document.getElementById('barChart').getContext('2d');
        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        };

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        });
    });
</script>
@endpush
