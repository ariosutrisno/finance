<?php

namespace App\Dashboard\BukuKas;

use Illuminate\Database\Eloquent\Model;

class DompetKategori extends Model
{
    protected $table = 'tbl_kategori';
    protected $fillable = [
        'idx_kategori',
        'kode_kategori',
        'kategori_nama',
    ];

    public function Dompet()
    {
        return $this->belongsTo('App\Dashboard\BukuKas\Dompet');
    }
}