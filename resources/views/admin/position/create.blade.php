@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      Pekerjaan <small>Tambah Data</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('admin.position.index') }}"></i> Jabatan</a></li>
      <li class="active">Tambah Data Jabatan</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Jabatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.position.store')}}" method="POST">
                @csrf

                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Jabatan </label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama Posisi" value="{{ old('name') }}">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
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
