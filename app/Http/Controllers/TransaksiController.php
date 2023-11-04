<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\jenisSampah;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() {
        $data = [
            'sampah' => jenisSampah::all(),
            'trans' => Transaksi::all(),
        ];
        return view("transaksi/v_tampil", compact('data'));
    }
}
