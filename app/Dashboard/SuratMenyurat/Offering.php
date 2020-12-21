<?php

namespace App\Dashboard\SuratMenyurat;

use Illuminate\Database\Eloquent\Model;

class Offering extends Model
{
    protected $table = 'tbl_offering_letter';
    protected $fillable = [
        'user_id',
        'letter_nama',
        'letter_email',
        'letter_telepon',
        'letter_alamat',
        'letter_tanggal_lamar',
        'letter_tanggal_mulai',
        'letter_tanggal_selesai',
        'letter_jam_mulai',
        'letter_jam_selesai',
        'letter_narahubung',
        'letter_telepon_pembimbing',
        'nomor_surat',
    ];
    protected $primaryKey = 'idx_offering_letter';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'int';
    // protected $dates = ['hutang_tanggal'];
}
