<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\HutangPiutang\Hutang;
use App\Dashboard\HutangPiutang\Piutang;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;
use Carbon\Carbon;


class HutangRepository
{

    public function listhutangpiutang($user_id)
    {
        
        $data_hutangpiutang = new HutangRepository();
        $data_hutangpiutang->total_hutang = Hutang::where('user_id','=',$user_id)->where('status','=','aktif')->sum('hutang_nominal');
        $data_hutangpiutang->total_piutang = Piutang::where('user_id','=',$user_id)->where('status','=','aktif')->sum('piutang_nominal');
        $data_hutangpiutang->hutangAll = Hutang::where('user_id','=',$user_id)->where('status','=','aktif')->get();
        $data_hutangpiutang->piutangAll = Piutang::where('user_id','=',$user_id)->where('status','=','aktif')->get();
        $data_hutangpiutang->hutangpiutangAll = array_merge($data_hutangpiutang->hutangAll->toArray(), $data_hutangpiutang->piutangAll->toArray());
        return $data_hutangpiutang;
    }
    
    public function create_hutangpiutang($request, $user_id_hutang, $user_id_piutang)
    {
        $BukuKas_hutang = BuatBuku::where('id', '=', $user_id_hutang)->where('idx_buku_kas', '=', $request->idx_buku_kas_hutang)->first();
        $BukuKas_piutang = BuatBuku::where('id', '=', $user_id_piutang)->where('idx_buku_kas', '=', $request->idx_buku_kas_piutang)->first();
        if ($request->idx_kategori_hutang == 1) {
            # code...
            $data_save = DB::table('hutang')->insert([
                'user_id'=> $user_id_hutang,
                'idx_kategori'=>$request->idx_kategori_hutang,
                'hutang_tanggal'=>$request->hutang_tanggal,
                'hutang_jatuh'=>$request->hutang_jatuh,
                'hutang_client'=>$request->hutang_client,
                'hutang_deskripsi'=>$request->hutang_deskripsi,
                'hutang_nominal'=>$request->hutang_nominal,
            ]);
            $idx_hutang = DB::getPdo()->lastInsertId();
            CatatanBuku::insert([
                'id_user' => $user_id_hutang,
                'idx_hutang' => $idx_hutang,
                'idx_buku_kas' => $request->idx_buku_kas_hutang,
                'idx_kategori' => $request->idx_kategori_hutang,
                'idx_sub_kategori' => $request->idx_sub_kategori_hutang,
                'catatan_keterangan' => $request->hutang_deskripsi,
                'catatan_tgl' => $request->hutang_tanggal,
                'catatan_jumlah' => $request->hutang_nominal,
                'catatan_jam' => Carbon::now('Asia/Jakarta'),
            ]);
            $nominal = $BukuKas_hutang->buku_saldo += $request->hutang_nominal;
            $BukuKas_hutang->buku_saldo = $nominal;
            $BukuKas_hutang->save();
        } else{
            $data_save = DB::table('piutang')->insert([
                'user_id' => $user_id_piutang,
                'idx_kategori' => $request->idx_kategori_piutang,
                'piutang_tanggal' => $request->piutang_tanggal,
                'piutang_jatuh' => $request->piutang_jatuh,
                'piutang_client' => $request->piutang_client,
                'piutang_deskripsi' => $request->piutang_deskripsi,
                'piutang_nominal' => $request->piutang_nominal,
            ]);
            $idx_piutang = DB::getPdo()->lastInsertId();
            CatatanBuku::insert([
                'id_user' => $user_id_piutang,
                'idx_piutang' => $idx_piutang,
                'idx_kategori' =>  $request->idx_kategori_piutang,
                'idx_buku_kas' =>  $request->idx_buku_kas_piutang,
                'idx_sub_kategori' =>  $request->idx_sub_kategori,
                'catatan_keterangan' =>  $request->piutang_deskripsi,
                'catatan_tgl' =>  $request->piutang_tanggal,
                'catatan_jumlah' =>  $request->piutang_nominal,
                'catatan_jam' => Carbon::now('Asia/Jakarta'),
            ]);
            $nominal = $BukuKas_piutang->buku_saldo -= $request->piutang_nominal;
            $BukuKas_piutang->buku_saldo = $nominal;
            $BukuKas_piutang->save();
        }
        return $data_save;
    }
    public function delete($request,$idx_hutang,$user_id)
    {
        if ($request->idx_kategori == '1') {
            # code...
            $hutangpiutang_delete = Hutang::where('idx_hutang','=',$idx_hutang)->where('user_id','=',$user_id)->update(['status'=>'non-aktif']);
        } else {
            # code...
            $hutangpiutang_delete = Piutang::where('idx_hutang','=',$idx_hutang)->where('user_id','=',$user_id)->update(['status'=>'non-aktif']);
        }
        return $hutangpiutang_delete;
    }
    public function update()
    {
        
    }
}
