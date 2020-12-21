<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Resources\BukuKas;
// use App\Http\Resources\CatatanBuku;
use Carbon\Carbon;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Http\Repositories\KategoriRepository;

class CatatanbukuRepository
{
    public function listcatatan($idx_buku_kas)
    {
        $user_id = Auth::id();
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
            ->join('users', 'users.id', '=', 'tbl_buku_kas.id')
            ->where('tbl_buku_kas.id', '=', $user_id)
            ->where('tbl_buku_kas.idx_buku_kas','=',$idx_buku_kas)
            ->orderBy('tbl_buku_kas.created_at', 'DESC')
            ->first();
        
            # code...

            $saldo_awal = BuatBuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $idx_buku_kas)->sum('buku_saldo_awal');
            $saldo_akhir = BuatBuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $idx_buku_kas)->sum('buku_saldo');
            $hasil = (($saldo_awal - $saldo_akhir) / $saldo_awal) * 100 / 100;
            $persen_saldo = number_format($hasil * 100, 1);
            if ($saldo_awal > $saldo_akhir) {
                # code...
                // $data_turun = 'Turun ' . $persen_saldo;
                $status = '0';
                $data_persen = '' . $persen_saldo;
            } elseif ($saldo_awal == $saldo_akhir) {
                $status = '1';
                $data_persen = '' . $persen_saldo;
            } else {
                // $data_naik = 'Naik ' . abs($persen_saldo);
                $data_persen = '' . abs($persen_saldo);
                $status = '2';
            }
            $data->persentase = $data_persen;
            $data->keterangan =  $status;
            $data->catatan_buku = CatatanBuku::where('id_user','=',$user_id)->where('idx_buku_kas','=',$idx_buku_kas)->orderBy('created_at','desc')->get();
            $data->pemasukan = CatatanBuku::where('id_user','=',$user_id)->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori', '1')->orderBy('created_at', 'desc')->get();
            $data->pengeluaran = CatatanBuku::where('id_user','=',$user_id)->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori','2')->orderBy('created_at','desc')->get();

        return $data;
    }


    public function createcatatan($user_id, $thisData)
    {
        
        $BukuKas = BuatBuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $thisData['idx_buku_kas'])->first();
        $create_catatan = DB::table('tbl_catatan_buku')
            ->insert(
                [
                    'id_user' => $user_id,
                    'idx_buku_kas' => $thisData['idx_buku_kas'],
                    'idx_kategori' => $thisData['idx_kategori'],
                    'idx_sub_kategori' => $thisData['idx_sub_kategori'],
                    'catatan_jumlah' => $thisData['catatan_jumlah'],
                    'catatan_jam' => $thisData['catatan_jam'],
                    'catatan_tgl' => $thisData['catatan_tgl'],
                    'catatan_keterangan' => $thisData['catatan_keterangan'],
                    'created_at' => Carbon::now(),
                ]
            );
            if ($thisData['idx_kategori'] == 1) {
                # code...
                $create_catatan;
                $BukuKas->buku_saldo += $thisData['catatan_jumlah'];
            } else {
            # code...
                $create_catatan;
            $pengeluaran = $BukuKas->buku_saldo - $thisData['catatan_jumlah'];
            $BukuKas->buku_saldo = $pengeluaran;
            }
            $BukuKas->save();
        return $create_catatan;
    }

    public function filtercatatan()
    {
        
    }
    public function deletecatatan($request, $idx_catatan_buku, $user_id)
    {
        if ($request->idx_kategori == 1) {
            # code...
            $delete_catatan = CatatanBuku::where('idx_catatan_buku','=',$idx_catatan_buku)->where('id_user','=',$user_id)->where('idx_kategori',1)->update(['status'=>'non-aktif']);
        } else {
            # code...
            $delete_catatan = CatatanBuku::where('idx_catatan_buku','=',$idx_catatan_buku)->where('id_user','=',$user_id)->where('idx_kategori',2)->update(['status'=>'non-aktif']);
        }
        return $delete_catatan;
        
    }
}
