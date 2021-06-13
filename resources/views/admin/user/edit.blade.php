@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      User <small>Update Data</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('admin.employee.index') }}"></i> User</a></li>
      <li class="active">Update Data User</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Update Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" action="{{ route('admin.user.update', $user)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Nama User</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama User" value="{{ old('name') ?? $user->name }}">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Masukan Email" value="{{ old('email') ?? $user->email }}">
                            @error('email')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('password') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password" value="{{ old('password') }}">
                            @error('password')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('confirm_password') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Konfirmasi Password</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Masukan Konfirmasi Password" value="{{ old('confirm_password') }}">
                            @error('confirm_password')
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
