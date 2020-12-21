<?php

namespace App\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'tb_buku_kas';
    protected $fillable = [
        'buku_nama',
        'buku_deskripsi',
        'buku_saldo',
        'buku_kategori',
        'buku_kategori',
    ];
}