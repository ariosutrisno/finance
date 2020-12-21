<?php

namespace App\Dashboard\HutangPiutang;

use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    protected $table = 'piutang';
    protected $fillable = [
        'idx_hutang',
        'user_id',
        'idx_kategori',
        'piutang_jatuh',
        'piutang_tanggal',
        'piutang_client',
        'piutang_deskripsi',
        'piutang_nominal',
    ];
    protected $primaryKey = 'idx_piutang';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';
    // protected $dates = ['piutang_tanggal'];

    public function CatatanBuku()
    {
        return $this->hasMany('App\Dashboard\BukuKas\CatatanBuku', 'idx_piutang');
    }
}