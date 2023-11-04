@extends('pengguna')

@section('content')

<div class="row">
    <div class="col-6">
        <div class="card mt-3">
            <div class="card-header">Kalkulator Bank Sampah </div>
            <div class="card-body">
                <form action="/insertTransaksi" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Jenis Sampah</label>
                        <select name="jenis_sampah" id="select2" class="form-control">
                            @foreach($data['sampah'] as $b)
                            <option value="{{ $b->jenis_sampah }}">{{ $b->jenis_sampah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga/kg</label>
                        <input type="number" class="form-control" name="harga_kg" id="harga_kg">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah/kg</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi">
                    </div>
                    <div class="mb-3">
                        <h3>Total dana Rp. <span id="total"></span></h3>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-6">
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
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['trans'] as $no => $d)
                        <tr>
                            
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->jenis_sampah }}</td>
                            <td>Rp. {{ number_format($d->harga_kg * $d->jumlah,0,',',',')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection