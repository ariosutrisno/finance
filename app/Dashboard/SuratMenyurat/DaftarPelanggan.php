<?php

namespace App\Dashboard\SuratMenyurat;

use Illuminate\Database\Eloquent\Model;

class DaftarPelanggan extends Model
{
    protected $table = 'tbl_daftar_pelanggan';
    protected $fillable = [
        'user_id',
        'pelanggan_nama',
        'pelanggan_tanggal',
        'pelanggan_alamat',
        'perusahaan',
        'pelanggan_email',
        'pelanggan_telepon',
    ];
    protected $primaryKey = 'idx_pelanggan';
    // protected $dates = ['pelanggan_surat'];
    public function quotation(){
         return $this->belongsTo('App\Dashboard\SuratMenyurat\Quotation','id_pelanggan');
    }
    public function Invoice(){
         return $this->belongsTo('App\Dashboard\SuratMenyurat\Invoice','id_pelanggan');
    }
}