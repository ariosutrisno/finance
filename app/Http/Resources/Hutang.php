<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Hutang extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'user_id' =>$this->user_id,
            'idx_kategori' =>$this->idx_kategori,
            'hutang_tanggal' =>$this->hutang_tanggal,
            'hutang_jatuh' =>$this->hutang_jatuh,
            'hutang_client' =>$this->hutang_client,
            'hutang_deskripsi' =>$this->hutang_deksripsi,
            'hutang_nominal' =>$this->hutang_nominal,
            'status' =>$this->status,
        ];
    }
}
