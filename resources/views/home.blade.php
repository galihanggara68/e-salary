@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.attendance.store') }}" method="POST">
                         @csrf
                        <div class="form-group @error('name') has-error @enderror">
                            <label>Nama Karyawan</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" disabled>
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('absent') has-error @enderror">
                            <label>Jenis</label>
                            <input type="text" class="form-control" name="absent" value="Hadir" disabled>
                            @error('absent')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('time') has-error @enderror">
                            <label>Waktu Hadir</label>
                            <input type="text" class="form-control" name="time" value="{{ date('Y-m-d H:i:s') }}" disabled>
                            @error('time')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group @error('description') has-error @enderror">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>

                            @error('description')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" name="att_type" class="btn btn-primary">{{ $attendance_type }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
