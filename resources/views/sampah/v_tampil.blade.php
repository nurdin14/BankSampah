@extends('admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-header">Form Tambah</div>
            <div class="card-body">
                <form action="/insertTrash" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Jenis Sampah</label>
                        <input type="text" class="form-control" name="jenis_sampah">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga/kg</label>
                        <input type="text" class="form-control" name="harga_kg">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card mt-3">
            <div class="card-header">
                Data Sampah
            </div>
            <div class="card-body">
                <table class="table table-stripped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Sampah</th>
                            <th>Harga/Kg</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['sampah'] as $no => $d)
                        <tr>
                            
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $d->jenis_sampah }}</td>
                            <td>{{ $d->harga_kg }}</td>
                            <td>
                                <a href="/editSampah/{{$d->id_sampah}}" class="btn btn-sm btn-warning">Ubah</a>
                                <a href="#" class="btn btn-sm btn-danger hapus" data-jenis="admin" data-id="{{ $d->id_sampah }}"
                                    data-nama="{{ $d->jenis_sampah }}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection