@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      Karyawan <small>Update Data</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{ route('admin.employee.index') }}">Karyawan</a></li>
      <li class="active">Update Karyawan</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Update Data Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.employee.update', $employee)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Nama Karyawan</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama Karyawan" value="{{ old('name') ?? $employee->name }}">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('gender') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                        <select name="gender" class="form-control select2" value="{{ $employee->gender }}">
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('address') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Alamat</label>

                        <div class="col-sm-10">
                            <textarea name="address" rows="3" class="form-control">{{ $employee->address }}</textarea>

                            @error('address')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('phone') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') ?? $employee->phone }}">
                            @error('phone')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') ?? $employee->email }}">
                            @error('email')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('position_id') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Jabatan</label>

                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" name="jabatan" placeholder="jabatan" value="{{ old('position_id') }}"> -->

                            <select name="position_id" class="form-control select2" >

                                @foreach($positions as $pos)
                                    <option {{ (old('position_id') ?? $employee->position_id) == $pos->id ? "selected" : null }} value="{{$pos->id}}">{{$pos->name}}</value>
                                @endforeach
                            </select>

                            @error('position')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('department_id') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Department</label>

                        <div class="col-sm-10">
                            <select name="department_id" class="form-control select2">

                                @foreach($departments as $dept)
                                    <option {{ (old('department_id') ?? $employee->department_id) == $pos->id ? "selected" : null }} value="{{$dept->id}}">{{$dept->name}}</value>
                                @endforeach
                            </select>

                            @error('department_id')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('group_id') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Golongan</label>

                        <div class="col-sm-10">
                            <select name="group_id" class="form-control select2">

                                @foreach($groups as $group)
                                    <option {{ (old('group_id') ?? $employee->group_id) == $pos->id ? "selected" : null }} value="{{$group->id}}">{{$group->name}}</value>
                                @endforeach
                            </select>

                            @error('group_id')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('salary') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Gaji Pokok</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="salary" placeholder="Gaji Pokok" value="{{ old('salary') ?? $employee->salary }}">
                            @error('salary')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('norek') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">No. Rekening</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="norek" placeholder="No. Rekening" value="{{ old('norek') ?? $employee->norek }}">
                            @error('norek')
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
