<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use App\Dashboard\SuratMenyurat\DaftarPelanggan as Pelanggan;

class DaftarPelanggan
{
    public function getAll($user_id)
    {
        $getpelanggan = Pelanggan::where('user_id','=',$user_id)->where('status','=','aktif')
        ->orderBy('created_at','desc')
        ->select('idx_pelanggan','user_id','pelanggan_nama','pelanggan_telepon','pelanggan_alamat','pelanggan_email','perusahaan')
        ->get();
        return $getpelanggan;
    }
    public function create($thisdata, $user_id)
    {
        Pelanggan::insert([
            'user_id'=>$user_id,
            'pelanggan_nama'=>$thisdata['pelanggan_nama'],
            'pelanggan_alamat'=>$thisdata['pelanggan_alamat'],
            'pelanggan_telepon'=>$thisdata['pelanggan_telepon'],
            'pelanggan_email'=>$thisdata['pelanggan_email'],
            'perusahaan'=>$thisdata['perusahaan'],
        ]);
    }
    public function update($request, $idx_pelanggan, $thisdata, $user_id)
    {
        Pelanggan::where('idx_pelanggan','=',$idx_pelanggan)->where('status','=','aktif')->update([
            'user_id' => $user_id,
            'pelanggan_nama' => $thisdata['pelanggan_nama'],
            'pelanggan_alamat' => $thisdata['pelanggan_alamat'],
            'pelanggan_telepon' => $thisdata['pelanggan_telepon'],
            'pelanggan_email' => $thisdata['pelanggan_email'],
            'perusahaan' => $thisdata['perusahaan'],
        ]);
    }
    public function deletepelanggan($idx_pelanggan,$user_id)
    {
        $pelanggan = Pelanggan::where('user_id','=',$user_id)->where('idx_pelanggan','=',$idx_pelanggan)->delete();
        return $pelanggan;
    }
}
