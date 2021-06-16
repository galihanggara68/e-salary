@extends('admin.template.default')

@section('content')

<section class="content-header">
  <h1>
    Karyawan
  </h1>
  <ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Karyawan</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Karyawan</h3>

            <div style="float: right!important">
              <a href="{{ route('admin.employee.create') }}" class="btn btn-primary btn-sm">+ Tambah Data Karyawan</a>
            </div>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Department</th>
                <th>Jabatan</th>
                <th>Gapok</th>
                <th>Benefit</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>

              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection

<form action="" method="post" id="deleteForm">
  @csrf
  @method("DELETE")
  <input type="submit" value="Hapus" style="display: none">
</form>

@push('script')

    <script src="{{ asset('admin/plugins/bs-notify.min.js') }}"></script>

    @include('admin.template.partials.alert')

    <script>
        $(function() {
          $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            ajax: '{{ route('admin.employee.data') }}',
            columns: [
              { data: 'DT_RowIndex', orderable: false, searchable: false },
              { data: 'name' },
              { data: 'gender' },
              { data: 'address' },
              { data: 'phone' },
              { data: 'email' },
              { data: 'department' },
              { data: 'position' },
              { data: 'salary' },
              { data: 'benefit' },
              { data: 'status' },
              { data: 'action' }
            ]
          })
        })
    </script>

@endpush
