<?php

namespace App\Dashboard\LaporanKas;

use Illuminate\Database\Eloquent\Model;

class Tahunan extends Model
{
    protected $table = 'laporan_kas_tahunan';
    protected $fillable = [
        'tahunan_code',
        'tahunan_tanggal',
        'tahunan_client',
        'tahunan_deskripsi',
        'tahunan_nominal',
    ];
    protected $dates = ['tahunan_tanggal'];
}