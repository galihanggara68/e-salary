@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      Complain <small>Tambah Data</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('admin.department.index') }}"></i> Complain</a></li>
      <li class="active">Tambah Data Complain</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Complain</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.complain.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group @error('complain') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Complain</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" name="complain" placeholder="Masukan Complain">{{old('complain')}}</textarea>
                            @error('complain')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
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
