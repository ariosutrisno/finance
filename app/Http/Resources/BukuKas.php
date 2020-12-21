<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BukuKas extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->idx_buku_kas,
            'buku_nama' => $this->buku_nama,
            'buku_deskripsi' => $this->buku_deskripsi,
            'buku_mata_uang' => $this->buku_mata_uang,
            'buku_saldo' => $this->buku_saldo,
            'status' => $this->status,
        ];
        
    }
}

class CatatanBuku extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'idx_buku_kas' => $this->idx_buku_kas,
            'id_user'=> $this->id_user,
            'idx_kategori' => $this->idx_kategori,
            'idx_sub_kategori' => $this->idx_sub_kategori,
            'idx_piutang' => $this->idx_piutang,
            'idx_hutang' => $this->idx_hutang,
            'catatan_jumlah' => $this->catatan_jumlah,
            'catatan_jam' => $this->catatan_jam,
            'catatan_tgl' => $this->catatan_jam,
            'catatan_keterangan' => $this->catatan_keterangan,
            'status' => $this->status,
        ];
        
    }
}
