<?php

namespace App\Dashboard\BukuKas;

use Illuminate\Database\Eloquent\Model;

class Model_Kategori extends Model
{
    protected $table = 'tbl_kategori';
    protected $fillable = [
        'kode_kategori',
        'kategori_nama'
    ];
    protected $primaryKey = 'idx_kategori';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';

    public function CatatanBuku()
    {
        return $this->hasMany('App\Dashboard\BukuKas\CatatanBuku', 'idx_kategori');
    }

    public function Model_Sub_Kategori()
    {
        return $this->hasMany('App\Dashboard\BukuKas\Model_Sub_Kategori');
    }
}