@extends('admin.template.default')

@section('content')

<section class="content-header">
  <h1>
    Jabatan
  </h1>
  <ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Jabatan Karyawan</li>
  </ol>
</section>

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Jabatan</h3>

            <div style="float: right!important">
              <a href="{{ route('admin.position.create') }}" class="btn btn-primary btn-sm">+ Tambah Data Jabatan</a>
            </div>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="dataTable" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>NO</th>
                <th>Jabatan</th>
                <th>Action</th>
              </tr>
              </thead>
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
            ajax: '{{ route('admin.position.data') }}',
            columns: [
              { data: 'DT_RowIndex', orderable: false, searchable: false },
              { data: 'name' },
              { data: 'action' },
            ]
          })
        })
    </script>

@endpush
