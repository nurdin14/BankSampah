<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_transaksi',
        'jenis_sampah',
        'harga_kg',
        'nama',
        'foto',
        'deskripsi',
        'jumlah',
    ];
}
