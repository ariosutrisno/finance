<?php

namespace App\Dashboard\SuratMenyurat;

use Illuminate\Database\Eloquent\Model;

class term extends Model
{
    protected $table = 'tbl_term';
    protected $fillable = ['id_invoice', 'standar_pembayaran', 'Dp','term','status'];
    protected $primaryKey = 'idx_term';

    public function invoice()
    {
        return $this->belongsTo('App\Dashboard\SuratMenyurat\Invoice', 'idx_invoice');
    }
}
