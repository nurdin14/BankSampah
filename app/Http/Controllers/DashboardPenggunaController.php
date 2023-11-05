<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\jenisSampah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardPenggunaController extends Controller
{
    public function index() {
        $data = [
            'sampah' => jenisSampah::all(),
            'trans' => Transaksi::all()
        ];
        
        $now = Carbon::now();
        $data['selisihHari'] = [];
        
        foreach ($data['trans'] as $transaksi) {
            $created_at = $transaksi->created_at;
            $selisihHari = $created_at->diffInDays($now);
            $data['selisihHari'][$transaksi->id_transaksi] = $selisihHari;
        }
        return view("dashboard-pengguna", compact("data"));
    }
}
