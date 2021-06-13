@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      Golongan <small>Tambah Data</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('admin.group.index') }}"></i> Golongan</a></li>
      <li class="active">Tambah Data Golongan</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Golongan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('admin.group.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Nama Golongan</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama Golongan" >
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('type') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Tunjangan</label>

                        <div class="col-sm-8">
                            <button id="btnBenefitAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                            <div class="row" id="benefitLists">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" name="benefit_names[]" class="form-control" placeholder="Nama Tunjangan">
                                    </div>
                                    <div class="col-md-1">
                                        -
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="benefit_amounts[]" class="form-control" placeholder="Nominal (Rp)">
                                    </div>
                                </div>
                            </div>
                            @error('type')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
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

@push("script")
    <script type="text/javascript">
        $(document).ready(() => {
            $("#btnBenefitAdd").on("click", (e) => {
                e.preventDefault();
                let list = `
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="benefit_names[]" class="form-control" placeholder="Nama Tunjangan">
                    </div>
                    <div class="col-md-1">
                        -
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="benefit_amounts[]" class="form-control" placeholder="Nominal (Rp)">
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="btn btn-danger btnDelete">x</a>
                    </div>
                </div>`;
                $("#benefitLists").append(list);
            });

            $("#benefitLists").on("click", ".row .col-md-1 a.btnDelete", (e) => {
                $(e.target).parent(".col-md-1").parent(".row").remove();
            });
        });
    </script>
@endpush
