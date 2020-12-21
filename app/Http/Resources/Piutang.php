<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Piutang extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'user_id' => $this->user_id,
            'idx_kategori' => $this->idx_kategori,
            'piutang_tanggal' => $this->piutang_tanggal,
            'piutang_jatuh' => $this->piutang_jatuh,
            'piutang_client' => $this->piutang_client,
            'piutang_deskripsi' => $this->piutang_deskripsi,
            'piutang_nominal' => $this->idx_piutang,
            'status' => $this->status,
        ];
    }
}
