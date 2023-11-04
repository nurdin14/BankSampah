<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\jenisSampah;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index() {
        $data = [
            'trans' => Transaksi::all(),
            'sampah' => jenisSampah::all(),
        ];

        return view('pengguna/v_tampil', compact('data'));
    }

    public function insertTransaksi(Request $request) {

        $data = [
            'id_transaksi' => $request->id_transaksi,
            'jenis_sampah' => $request->jenis_sampah,
            'harga_kg' => $request->harga_kg,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFile = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi = public_path('uploads');

            $foto->move($lokasi, $namaFile);
            $data['foto'] = 'uploads/' . $namaFile;
        }

        Transaksi::create($data);
        return redirect()->route('pengguna')->with('success', 'Data berhasil ditambahkan!');
    }
}
