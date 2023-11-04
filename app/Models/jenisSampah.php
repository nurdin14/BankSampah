<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisSampah extends Model
{
    use HasFactory;

    protected $table = 'jenis_sampahs';
    protected $primaryKey = 'id_sampah';

    protected $fillable = [
        'id_sampah',
        'jenis_sampah',
        'harga_kg',
    ];
}
