<?php

namespace App\Dashboard\LaporanKas;

use Illuminate\Database\Eloquent\Model;

class Harian extends Model
{
    protected $table = 'laporan_kas_harian';
    protected $fillable = [
        'harian_code',
        'harian_tanggal',
        'harian_client',
        'harian_deskripsi',
        'harian_nominal',
    ];
    protected $dates = ['harian_tanggal'];
}