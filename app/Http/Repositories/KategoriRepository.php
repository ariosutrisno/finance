<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\Model_Sub_Kategori;

class KategoriRepository
{
    var $sub_kategori;
    var $sub_kategori_id_user;
    public function getkategori($idx_kategori, $user_id)
    {
        $sub_kategori = new KategoriRepository();
        $sub_kategori->sub_kategori = Model_Sub_Kategori::where('idx_kategori','=',$idx_kategori)->where('status','=','aktif')->get();
        $sub_kategori->sub_kategori_id_user = Model_Sub_Kategori::where('idx_kategori', '=', $idx_kategori)->where('status', '=', 'aktif')->where('user_id', '=', $user_id)->get();
        return $sub_kategori;
    }

    public function tambahKategori($request,$user_id)
    {
        if ($request->idx_kategori == 1) {
            # code...
            Model_Sub_Kategori::insert([
                'user_id'=>$user_id,
                'idx_kategori'=>$request->kategori,
                'sub_nama'=>$request->sub_nama,
            ]);
        } else {
            # code...
            Model_Sub_Kategori::insert([
                'user_id' => $user_id,
                'idx_kategori' => $request->kategori,
                'sub_nama' => $request->sub_nama,
            ]);
        }
    }
}
