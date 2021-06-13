@extends('admin.template.default')

@section('content')

<section class="content-header">
  <h1>
    Kehadiran
  </h1>
  <ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kehadiran</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Kehadiran</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>In</th>
                <th>Out</th>
                <th>Total Jam Kerja</th>
                <th>Deskripsi</th>
                {{-- <th>Aksi</th> --}}
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

@push('script')

    <script>
        $(function() {
          $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.attendance.data') }}',
            columns: [
              { data: 'DT_RowIndex', orderable: false, searchable: false },
              { data: 'name' },
              { data: 'date' },
              { data: 'IN' },
              { data: 'OUT' },
              { data: 'total' },
              { data: 'description' }
            ]
          })
        })
    </script>

@endpush
