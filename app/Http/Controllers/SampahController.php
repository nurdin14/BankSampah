<?php

namespace App\Http\Controllers;

use App\Models\jenisSampah;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    public function index() {
        $data = [
            'sampah' => jenisSampah::all(),
            'trans' => Transaksi::all()
        ];
        return view("sampah/v_tampil", compact('data'));
        
    }

    public function insertTrash(Request $request) {


        $data = [
            'id_sampah' => $request->id_sampah,
            'nama' => $request->nama,
            'jenis_sampah' => $request->jenis_sampah,
            'harga_kg' => $request->harga_kg,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFile = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi = public_path('uploads');

            $foto->move($lokasi, $namaFile);
            $data['foto'] = 'uploads/' . $namaFile;
        }

        JenisSampah::create($data);
        return redirect()->route('sampah')->with('success', 'Data berhasil ditambahkan!');
    }


    public function editSampah($id_sampah) {
        $data = JenisSampah::find($id_sampah);
        return view('sampah/v_ubah', compact('data'));
    }

    public function updateSampah(Request $request, $id_sampah) {

        $data = [
            'id_sampah' => $request->id_sampah,
            'nama' => $request->nama,
            'jenis_sampah' => $request->jenis_sampah,
            'harga_kg' => $request->harga_kg,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Validasi tipe file jika diperlukan
            $validatedData = $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh validasi untuk gambar
            ]);

            $namaFile = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi = public_path('uploads');

            $foto->move($lokasi, $namaFile);
            $data['foto'] = 'uploads/' . $namaFile;

            // Hapus gambar lama jika ada
            if (!empty($request->foto_old)) {
                $oldFile = public_path($request->foto_old);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
        }

        jenisSampah::find($id_sampah)->update($data);
        return redirect()->route('sampah')->with('success', 'Data berhasil diubah!');
    }


    public function deleteSampah($id_sampah) {

        $buku = JenisSampah::find($id_sampah);

        // Hapus gambar terkait dari direktori 'public/uploads'
        if (!empty($buku->foto)) {
            $gambarPath = public_path($buku->foto);
            unlink($gambarPath);
        }

        // Hapus catatan dari basis data
        $buku->delete();

        return redirect()->route('sampah')->with('success', 'Data berhasil dihapus!');
    }
}
