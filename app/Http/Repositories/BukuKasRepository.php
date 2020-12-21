<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Resources\BukuKas;
use App\Http\Resources\CatatanBuku;
use Carbon\Carbon;
use App\Dashboard\BukuKas\BuatBuku;
class BukuKasRepository
{
    public function createkas($id_user,$thisdata)
    {
        $create_kas = DB::table('tbl_buku_kas')
        ->insert([
            'id' => $id_user,
            'buku_nama' => $thisdata['buku_nama'],
            'buku_deskripsi' => $thisdata['buku_deskripsi'],
            'buku_mata_uang' => $thisdata['buku_mata_uang'],
            'buku_saldo' => $thisdata['buku_saldo'],
            'buku_saldo_awal' => $thisdata['buku_saldo_awal'],
            'created_at'=>Carbon::now(),
        ]);
        return $create_kas;
    }

    public function listkas($user_id)
    {
        $data = DB::table('tbl_buku_kas')
        ->select(
            'tbl_buku_kas.id',
            'tbl_buku_kas.idx_buku_kas',
            'tbl_buku_kas.buku_nama',
            'tbl_buku_kas.buku_deskripsi',
            'tbl_buku_kas.buku_mata_uang',
            'tbl_buku_kas.buku_saldo_awal',
            'tbl_buku_kas.buku_saldo',
            'users.id',
        )
        -> join('users', 'users.id', '=', 'tbl_buku_kas.id')
        ->where('tbl_buku_kas.id','=',$user_id)
        ->orderBy('tbl_buku_kas.created_at', 'DESC')
        ->get();
        for ($i=0; $i < count($data); $i++) {
            # code...
            $saldo_awal = BuatBuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $data[$i]->idx_buku_kas)->sum('buku_saldo_awal');
            $saldo_akhir = BuatBuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $data[$i]->idx_buku_kas)->sum('buku_saldo');
            $hasil = (($saldo_awal - $saldo_akhir) / $saldo_awal) * 100 / 100;
            $persen_saldo = number_format($hasil * 100,1);
            if ($saldo_awal > $saldo_akhir) {
                # code...
                // $data_turun = 'Turun ' . $persen_saldo;
                $status = '0';
                $data_persen = '' . $persen_saldo;
            }elseif($saldo_awal == $saldo_akhir){
                $status = '1';
                $data_persen = ''. $persen_saldo;
            } else {
                // $data_naik = 'Naik ' . abs($persen_saldo);
                $data_persen = '' . abs($persen_saldo);
                $status = '2';
            }
            $data[$i]->persentase = $data_persen;
            $data[$i]->keterangan =  $status;
            
        }
        
        return $data;
    }

}
