<?php

namespace App\Dashboard\BukuKas;

use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    protected $table = 'dompet_pribadi';
    protected $fillable = [
        'dompet_code',
        'dompet_tanggal',
        'dompet_kategori',
        'dompet_deskripsi',
        'dompet_nominal',
        'dompet_jam',
        'dompet_saldo',
    ];
    protected $dates = ['dompet_tanggal'];


    public function DompetKategori()
    {
        return $this->hasOne('App\Dashboard\BukuKas\DompetKategori');
    }
}