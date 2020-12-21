<?php

namespace App\Dashboard\BukuKas;

use Illuminate\Database\Eloquent\Model;

class Model_Sub_Kategori extends Model
{
    protected $table = 'tbl_sub_kategori';
    protected $fillable = [
        'idx_kategori',
        'sub_nama'
    ];
    protected $primaryKey = 'idx_sub_kat';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';

    public function Model_Kategori()
    {
        return $this->belongsTo('App\Dashboard\BukuKas\Model_Kategori', 'idx_kategori');
    }
    public function CatatanBuku()
    {
        return $this->hasMany('App\Dashboard\BukuKas\CatatanBuku', 'idx_sub_kategori');
    }
}