@extends('admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card mt-3">
            <div class="card-header">Form Tambah</div>
            <div class="card-body">
                <form action="/updateSampah/{{$data->id_sampah}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Jenis Sampah</label>
                        <input type="text" class="form-control" name="jenis_sampah" value="{{ $data->jenis_sampah }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga/kg</label>
                        <input type="text" class="form-control" name="harga_kg" value="{{ $data->harga_kg }}">
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection