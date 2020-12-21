<?php

namespace App\Dashboard\BukuKas;

use Illuminate\Database\Eloquent\Model;

class CariTransaksi extends Model
{
    protected $table = 'cari_transaksi';
    protected $fillable = [
        'transaksi_tanggal',
        'transaksi_kategori',
        'transaksi_deskripsi',
        'transaksi_nominal',
        'transaksi_saldo',
    ];
    protected $dates = ['transaksi_tanggal'];
}
