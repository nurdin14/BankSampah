@extends('pengguna')

@section('content')
<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-header">
                Data Transaksi
            </div>
            <div class="card-body">
                <table class="table table-stripped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis Sampah</th>
                            <th>Harga/Kg</th>
                            <th>Total</th>
                            <th>Penyimpanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['trans'] as $no => $d)
                        <tr>
                            
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->jenis_sampah }}</td>
                            <td>Rp. {{ number_format($d->harga_kg,0,',',',')}}</td>
                            <td>Rp. {{ number_format($d->harga_kg * $d->jumlah,0,',',',')}}</td>
                            <td>{{ $data['selisihHari'][$d->id_transaksi] }} hari</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card mt-3" style="width: 50rem;">
            <h3 class="card-header">Trend Sampah</h3>
            <div class="card-body">
                <canvas id="trend-sampah-chart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection