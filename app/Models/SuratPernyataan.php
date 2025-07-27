<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPernyataan extends Model
{
    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',
        'alamat_pelanggan',
        'tarif_pelanggan',
        'daya_pelanggan',
        'tanggal_ttd',
        'nama_ttd',
        'alamat_ttd',
        'nik_ttd',
        'nohp_ttd',
        'file_ttd',
    ];
}
