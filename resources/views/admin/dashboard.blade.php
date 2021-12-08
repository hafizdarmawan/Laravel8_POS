@extends('layouts.admin')
@section('title')
    Dashboard
@endsection

@section('breadcrumb')
@parent
<li class="active">Dashboard</li>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $kategori }}</h3>
                {{-- <h3>{{ $kategori }}</h3> --}}

                <p>Total Kategori</p>
            </div>
            <div class="icon">
                <i class="fa fa-cube"></i>
            </div>
            <a href="" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            {{-- <a href="{{ route('kategori.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
        <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $produk }}</h3>

                <p>Total Produk</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
               <a href="" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            {{-- <a href="{{ route('produk.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $member }}</h3>

                <p>Total Member</p>
            </div>
            <div class="icon">
                <i class="fa fa-id-card"></i>
            </div>
            <a href="" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            {{-- <a href="{{ route('member.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ $supplier }}</h3>

                <p>Total Supplier</p>
            </div>
            <div class="icon">
                <i class="fa fa-truck"></i>
            </div>
            <a href="" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
            {{-- <a href="{{ route('supplier.index') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Pendapatan {{ tanggal_indonesia($tanggal_awal, false) }} s/d {{ tanggal_indonesia($tanggal_akhir, false) }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 180px;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection


@push('scripts')

<script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script>
<!-- ChartJS -->
<script>
$(function(){
    let salesChartCanvas = $(#salesChart).get(0).getContext('2d');
    let salesChart = new Chart(salesChartCanvas);
    let salesChartData = {
        labels:{{ json_encode($data_tanggal) }},
        datasets:[
            {
                label                :'Pendapatan',
                fillColor            :'rgba(60,141,188,0.9)',
                strokeColor          : '#3b8bba',
                pointColor           : 'rgba(60,141,188,1)',
                pointHightLightFill  : '#fff',
                pointHightLightStroke: 'rgba(60,141,188,1)',
                data:{{ json_encode($data_pendapatan) }}
            }
        ]
    };

    var salesChartOptions = {
        pointDot    : false,
        responsive  : true
    };

    salesChart.line(salesChartData,salesChartOptions);
});
</script>
@endpush