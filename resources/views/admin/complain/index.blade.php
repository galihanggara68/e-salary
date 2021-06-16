@extends('admin.template.default')

@section('content')

<section class="content-header">
  <h1>
    Laporan
  </h1>
  <ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Laporan</h3>
            <div style="float: right!important">
                <a href="{{ route('admin.complain.create') }}" class="btn btn-primary btn-sm">+ Tambah Data Complain</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>NO</th>
                <th>Nama Karyawan</th>
                <th>Pesan</th>
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

<form action="" method="post" id="deleteForm">
  @csrf
  @method("DELETE")
  <input type="submit" value="Hapus" style="display: none">
</form>

@endsection

@push('script')

  <script src="{{ asset('admin/plugins/bs-notify.min.js') }}"></script>

  @include('admin.template.partials.alert')

    <script>
        $(function() {
          $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.complain.data') }}',
            columns: [
              { data: 'DT_RowIndex', orderable: false, searchable: false },
              { data: 'employee' },
              { data: 'complain' },
              { data: 'action' },
            ]
          })
        })
    </script>

@endpush
