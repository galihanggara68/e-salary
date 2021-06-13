@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      Absensi <small>Tambah Data</small>   
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tambah Data Absensi</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Absensi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.department.store')}}" method="POST">
                @csrf

                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Nama Karyawan</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Masukan Nama Karyawan" value="{{ old('name') }}">
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Apakah Hadir</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Masukan Nama Karyawan" value="{{ old('name') }}">
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Waktu Hadir</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Masukan Nama Karyawan" value="{{ old('name') }}">
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('description') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Deskripsi</label>

                    <div class="col-sm-10">
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        
                        @error('description')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
            </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Tambah Data</button>
                </div>
                <!-- /.box-footer -->
            </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection