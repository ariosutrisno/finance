<?php

namespace App\Dashboard\BukuKas;

use Illuminate\Database\Eloquent\Model;

class CatatanBuku extends Model
{
    protected $table = 'tbl_catatan_buku';
    protected $fillable = [
        'idx_buku_kas',
        'idx_kategori',
        'idx_sub_kategori',
        'idx_hutang',
        'idx_piutang',
        'catatan_jumlah',
        'catatan_jam',
        'catatan_tgl',
        'catatan_keterangan',
    ];
    protected $primaryKey = 'idx_catatan_buku';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';

    public function BuatBuku()
    {
        return $this->belongsTo('App\Dashboard\BukuKas\BuatBuku', 'idx_buku_kas');
    }

    public function Model_Kategori()
    {
        return $this->belongsTo('App\Dashboard\BukuKas\Model_Kategori', 'idx_kategori');
    }
    public function Model_Sub_Kategori()
    {
        return $this->belongsTo('App\Dashboard\BukuKas\Model_Sub_Kategori', 'idx_sub_kategori');
    }

    public function Piutang()
    {
        return $this->belongsTo('App\Dashboard\HutangPiutang\Piutang', 'idx_piutang');
    }

    // public function getAttributeKategori()
    // {
    //     return $this->Model_Kategori->pluck()->toArray();
    // }
}