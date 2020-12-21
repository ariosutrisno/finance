<?php

namespace App\Dashboard\LaporanKas;

use Illuminate\Database\Eloquent\Model;

class Mingguan extends Model
{
    protected $table = 'laporan_kas_mingguan';
    protected $fillable = [
        'mingguan_code',
        'mingguan_tanggal',
        'mingguan_client',
        'mingguan_deskripsi',
        'mingguan_nominal',
    ];
    protected $dates = ['mingguan_tanggal'];
}