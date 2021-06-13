@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      Departemen    <small>Update Data</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{ route('admin.department.index') }}">Departemen</a></li>
      <li class="active">Update Departemen</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Update Data Departemen</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.department.update', $department)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Nama Departemen</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama Departemen" value="{{ old('name') ?? $department->name }}">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('status') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-10">
                        <select name="status" class="form-control select2">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak aktif  ">Tidak Aktif</option>
                        </select>
                        @error('status')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <button type="submit" class="btn btn-info">Update Data</button>
                </div>
                <!-- /.box-footer -->
            </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection