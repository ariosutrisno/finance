<?php

namespace App\Dashboard\SuratMenyurat;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'tbl_invoice';
    protected $fillable = [
        'user_id',
        'id_pelanggan',
        'tanggal_invoice',
        'jatuh_tempo_invoice',
        'nomor_surat',
        'perihal',
        'jumlah_tagihan',
        'keterangan',
    ];
    protected $primaryKey = 'idx_invoice';

    public function Daftar_Pelanggan()
    {
        return $this->hasMany('App\Dashboard\SuratMenyurat\DaftarPelanggan', 'idx_pelanggan');
    }
    public function item()
    {
        return $this->hasMany('App\Dashboard\SuratMenyurat\item', 'id_invoice');
    }
    public function term()
    {
        return $this->hasMany('App\Dashboard\SuratMenyurat\term', 'idx_term');
    }
}
