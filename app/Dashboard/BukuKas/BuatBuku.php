<?php

namespace App\Dashboard\BukuKas;

use Illuminate\Database\Eloquent\Model;

class BuatBuku extends Model
{
    protected $table = 'tbl_buku_kas';
    protected $fillable = [
        'buku_code',
        // 'buku_zonawaktu',
        'buku_nama',
        'buku_deskripsi',
        'buku_saldo',
        'buku_saldo_awal',
        'buku_mata_uang',
        'buku_pemasukan',
        'buku_pengeluaran',
    ];
    protected $primaryKey = 'idx_buku_kas';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';

    public function CatatanBuku()
    {
        return $this->hasMany('App\Dashboard\BukuKas\CatatanBuku');
    }

    public function Model_Kategori()
    {
        return $this->belongsTo('App\Dashboard\BukuKas\Model_Kategori', 'idx_kategori');
    }
    public function User()
    {
        return $this->belongsTo('App\User', 'id');
    }
}