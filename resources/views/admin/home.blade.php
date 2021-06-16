@extends('admin.template.default')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        @can("admin")
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
            </section>

            <!-- Main content -->
            <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3>{{ $employee }}</h3>

                    <p>Jumlah Karyawan</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('admin.employee.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                    <h3>{{ $salaries }}</h3>

                    <p>Total Gaji & Tunjangan</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('admin.salary.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                    <h3>{{ $attendances }}</h3>

                    <p>Absensi</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.attendance.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                </div>

            </div>
            <!-- /.row -->
        @else
        <h1 class="row col-md-12">
            Welcome
            <small>{{auth()->user()->name}}</small>
        </h1>
        @endcan
    </section>
    <!-- /.content -->
@endsection
