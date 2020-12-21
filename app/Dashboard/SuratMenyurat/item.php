<?php

namespace App\Dashboard\SuratMenyurat;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    //
    protected $table = 'tbl_item_project';
    protected $fillable = ['id_quotation', 'id_invoice', 'nama_project', 'biaya_project', 'status'];
    protected $primaryKey ='id_item';

    public function quotation(){
        return $this->belongsTo('App\Dashboard\SuratMenyurat\Quotation', 'id_quotation' );
    }
    public function invoice(){
        return $this->belongsTo('App\Dashboard\SuratMenyurat\Invoice', 'idx_invoice' );
    }
}
