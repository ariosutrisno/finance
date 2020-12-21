<?php

namespace App\Dashboard\HutangPiutang;

use App\Dashboard\BukuKas\CatatanBuku;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    protected $table = 'hutang';
    protected $fillable = [
        'idx_hutang',
        'idx_kategori',
        'hutang_jatuh',
        'hutang_tanggal',
        'hutang_client',
        'hutang_deskripsi',
        'hutang_nominal',
    ];
    protected $primaryKey = 'idx_hutang';
    public $incrementing = true;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';
    // protected $dates = ['hutang_tanggal'];

    public function CatatanBuku()
    {
        // return $this->hasMany(CatatanBuku::class);
        return $this->hashMany('App\Dashboard\BukuKas\CatatanBuku', 'idx_hutang');
    }
}