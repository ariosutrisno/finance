<?php

namespace App\Dashboard\SuratMenyurat;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    //
    protected $table = 'tbl_quotation';
    protected $fillable = [
 
        // 'id_quotation',
        'user_id',
        'nomor_surat',
        'id_pelanggan',
        'perihal',
        'tgl_quotation',
        'tgl_jatuh_tempo',
        'jumlah_pembayaran',
        'keterangan',
    ];
    protected $primaryKey = 'id_quotation';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';

    //RELASI QUOTATION KE ITEM 
    public function item(){
        
            return $this->hasMany('App\Dashboard\SuratMenyurat\item','id_quotation');
        
    }
    public function pelanggan(){
        return $this->hasMany('App\Dashboard\SuratMenyurat\DaftarPelanggan', 'idx_pelanggan');
    }
}
