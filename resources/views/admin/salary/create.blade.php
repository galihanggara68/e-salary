@extends('admin.template.default')

@section('content')

<section class="content-header">
    <h1>
      Gaji & Tunjangan <small>Tambah Data</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('admin.benefit.index') }}"></i> Gaji & Tunjangan</a></li>
      <li class="active">Tambah Data Gaji & Tunjangan</li>
    </ol>
  </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Gaji & Tunjangan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form class="form-horizontal" action="{{ route('admin.salary.employee')}}" method="GET">
                @csrf
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Nama Karyawan</label>

                        <div class="col-sm-4">
                            <select name="id" class="form-control select2">
                            @foreach ($employees as $emp)
                                <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                            @endforeach
                            </select>
                            @error('id')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="form-group @error('date') has-error @enderror">
                        <label for="" class="col-sm-2 control-label">Bulan</label>

                        <div class="col-sm-4">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="date" readonly class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Tampilkan Karyawan</button>
                </div>
            </form>

            @if (isset($employee))
                <form class="form-horizontal" action="{{ route('admin.salary.store')}}" method="POST">
                    @csrf

                    <div class="box-body">
                        <div class="form-group @error('employee_id') has-error @enderror">
                            <input type="hidden" name="employee_id" value="{{$employee->id}}" />
                            <input type="hidden" name="date" value="{{$date}}" />
                            <label for="" class="col-sm-2 control-label">Nama Karyawan</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="name" value="{{$employee->name}}" />
                                @error('name')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group @error('salary') has-error @enderror">
                            <label for="" class="col-sm-2 control-label">Gaji Pokok</label>

                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Rp
                                    </div>
                                    <input type="text" class="form-control" readonly name="salary" value="{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $employee->salary)}}" />
                                </div>
                                @error('salary')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group @error('sick') has-error @enderror">
                            <label for="" class="col-sm-2 control-label">Izin atau Sakit</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="sick" value="{{$sick}}" />
                                @error('sick')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group @error('late') has-error @enderror">
                            <label for="" class="col-sm-2 control-label">Terlambat</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="late" value="{{$late}}" /> x Rp 15.000
                                @error('late')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group @error('absent') has-error @enderror">
                            <label for="" class="col-sm-2 control-label">Tanpa Keterangan</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="absent" value="{{$absent}}" />
                                @error('absent')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group @error('norek') has-error @enderror">
                            <label for="" class="col-sm-2 control-label">No. Rekening</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly name="norek" value="{{$employee->norek}}" />
                                @error('norek')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group @error('type') has-error @enderror">
                            <label for="" class="col-sm-2 control-label">Tunjangan</label>
                            <div class="row col-sm-8">
                                @foreach ($employee->group->benefit as $benefit)
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="hidden"  class="benefitId" value="{{$benefit->id}}" />
                                            <input class="form-control" readonly type="text" class="form-control" placeholder="Nama Tunjangan" value="{{$benefit->name}}" />
                                        </div>
                                        <div class="col-md-1">
                                            -
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    Rp
                                                </div>
                                                <input class="form-control" readonly type="number" class="form-control" placeholder="Nominal (Rp)" value="{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $benefit->amount)}}" />
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="col-md-8 col-md-offset-2">
                            <button id="btnBenefitAdd" class="btn btn-primary">Tambah Tunjangan <i class="fa fa-plus"></i></button>
                            <div class="row" id="benefitLists">
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group @error('total') has-error @enderror">
                            <label for="" class="col-sm-2 control-label">Total</label>

                            <div class="col-sm-10">
                                <input type="hidden" id="subtotal" value="{{$total}}" />
                                <input type="hidden" id="total" name="total" value="{{$total}}" />
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        Rp
                                    </div>
                                    <input type="text" class="form-control" id="totalDisp" readonly value="{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $total)}}" />
                                </div>
                                @error('total')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
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
            @endif
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection

@push("script")
    <script src="{{ asset('admin/plugins/bs-notify.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd'
            });

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
                        <input type="number" name="benefit_amounts[]" class="form-control" placeholder="Nominal (Rp)">
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="btn btn-danger btnDelete">x</a>
                    </div>
                </div>`;
                $("#benefitLists").append(list);
            });

            $("form").on("keyup", "input[name='benefit_amounts[]']", (e) => {
                let benefits = Array.from($("form input[name='benefit_amounts[]']")).map(e => parseInt(e.value)).reduce((p, c) => p+c, 0);
                let total = benefits+parseInt($("#subtotal").val());
                $("#total").val(total);
                $("#totalDisp").val(total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
            });

            $("#benefitLists").on("click", ".row .col-md-1 a.btnDelete", (e) => {
                $(e.target).parent(".col-md-1").parent(".row").remove();
            });
        });
    </script>
@endpush
