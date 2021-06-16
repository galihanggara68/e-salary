<table style="width: 100%; height: auto">
        <tr>
            <th colspan="3" align="left"><h2>TECHPOLITAN</h2></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>SLIP GAJI</th>
        </tr>
        <tr>
            <th colspan="2" align="left">Nama</th>
            <th align="left">:</th>
            <th align="left">{{$employee->name}}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th colspan="2" align="left">Jabatan</th>
            <th align="left">:</th>
            <th align="left">{{$employee->position->name}}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th colspan="2" align="left">Periode</th>
            <th align="left">:</th>
            <th align="left">{{$date->isoFormat("MMMM YYYY")}}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
</table>
<table style="margin-top: 40px; width: 100%" border="1" cellspacing=".5px" cellpadding="5px">
    <thead>
        <tr>
            <th colspan="2" align="center">Penerimaan</th>
            <th colspan="2" align="center">Potongan</th>
        </tr>
    </thead>
    <tbody style="margin-top: 20px;">
        {{-- <tr>
            <td>Gaji</td>
            <td align="right">3.000.000</td>
            <td>Potongan Terlambat</td>
            <td align="right">0</td>
        </tr>
        <tr>
            <td>Gaji Harian</td>
            <td align="right">200.000</td>
            <td>Potongan Absen</td>
            <td align="right">0</td>
        </tr>
        <tr>
            <td>Lembur</td>
            <td align="right">0</td>
            <td>PPh 21</td>
            <td align="right">0</td>
        </tr>
        <tr>
            <td>Lain-lain</td>
            <td></td>
            <td></td>
            <td></td>
        </tr> --}}
        @foreach ($dataTables as $data)
            <tr>
                <td>{{$data[0]}}</td>
                <td align="right">{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $data[1])}}</td>
                <td>{{$data[2]}}</td>
                <td align="right">{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $data[3])}}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th align="left">Total Penerimaan</th>
            <th align="right">{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $totalGaji)}}</th>
            <th align="left">Total Potongan</th>
            <th align="right">{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $totalPotongan)}}</th>
        </tr>
        <tr>
            <th align="left">Take Home Pay</th>
            <th align="right">{{preg_replace("/(\d)(?=(\d{3})+(?!\d))/", "$1.", $nett)}}</th>
        </tr>
    </tfoot>
</table>

<div>
    <h4>
        <span style="float: left">* {{$date->firstOfMonth()->isoFormat("DD MMMM")." - ".$date->lastOfMonth()->isoFormat("DD MMMM YYYY")}}</span>
        <span style="float: right">BSD, {{Carbon\Carbon::now()->isoFormat("DD MMMM YYYY")}}</span>
    </h4>
</div>

<div style="clear: both; megin-top: 100px">
    <h4 style="line-height: 1px;">
        Transfer ke :
    </h4>
    <h4 style="line-height: 1px;">
        BCA : {{$employee->norek}}
    </h4>
    <h4 style="line-height: 1px;">
        Atas Nama : {{$employee->name}}
    </h4>
</div>
