<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Dashboard\BukuKas\CatatanBuku;
use App\Dashboard\BukuKas\BuatBuku;

class DashboardRepository
{
    public function getallbukukas($request, $user_id)
    {
        $data_kas = new DashboardRepository();
        if ($request->idx_buku_kas == null) {
            // SEMUA KAS
            # code...
            $data_kas->total_saldo_seluruh = Buatbuku::where('id', '=', $user_id)->where('status', '=', 'aktif')->sum('buku_saldo');
            $data_kas->saldo_semua_kas = Buatbuku::where('id', '=', $user_id)->where('status', '=', 'aktif')->sum('buku_saldo');
            $hasilpemasukan = CatatanBuku::where('id_user', '=', $user_id)->where('idx_kategori', '=', 1)->sum('catatan_jumlah');
            $hasilpengeluaran = CatatanBuku::where('id_user', '=', $user_id)->where('idx_kategori', '=', 2)->sum('catatan_jumlah');
            $saldo_awal = BuatBuku::where('id', '=', $user_id)->sum('buku_saldo_awal');
            $saldo_akhir = BuatBuku::where('id', '=', $user_id)->sum('buku_saldo');
            //bukukas
            if($saldo_awal == 0 && $saldo_akhir == 0){
                $hasil = 0;
                $persen_saldo = 0;
            }else{
                $hasil = (($saldo_awal - $saldo_akhir) / $saldo_awal) * (100/100);
                $persen_saldo = number_format($hasil, 1);
            }
            //Pemasukan
            if ($saldo_awal == 0 && $hasilpemasukan == 0) {
                # code...
                $hasilpemasukan = 0;
                $persen_saldo_pemasukan = 0;
            } else {
                # code...
                $hasilpemasukan = (($saldo_awal - $hasilpemasukan) / $saldo_awal) * (100/100);
                $persen_saldo_pemasukan = number_format($hasilpemasukan, 1);
            }
            
            // Pengeluaran
            if ($saldo_awal == 0 && $hasilpengeluaran == 0) {
                # code...
                $hasilpengeluaran = 0;
                $persen_saldo_pengeluaran = 0;
            } else {
                # code...
                $hasilpengeluaran = (($saldo_awal - $hasilpengeluaran) / $saldo_awal) * (100/100);
                $persen_saldo_pengeluaran = number_format($hasilpengeluaran, 1);
            }
            
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
            //persentase pemasukan
            if ($saldo_awal > $hasilpemasukan) {
                # code...
                // $data_turun = 'Turun ' . $persen_saldo;
                $status_pemasukan = '0';
                $data_persen_pemasukan = '' . $persen_saldo_pemasukan;
            } elseif ($saldo_awal == $hasilpemasukan) {
                $status_pemasukan = '1';
                $data_persen_pemasukan = '' . $persen_saldo_pemasukan;
            } else {
                // $data_naik = 'Naik ' . abs($persen_saldo);
                $status_pemasukan = '' . abs($persen_saldo_pemasukan);
                $data_persen_pemasukan = '2';
            }
            //persentase pengeluaran
            if ($saldo_awal > $hasilpengeluaran) {
                # code...
                // $data_turun = 'Turun ' . $persen_saldo;
                $status_pengeluaran = '0';
                $data_persen_pengeluaran = '' . $persen_saldo_pengeluaran;
            } elseif ($saldo_awal == $hasilpengeluaran) {
                $status_pengeluaran = '1';
                $data_persen_pengeluaran = '' . $persen_saldo_pengeluaran;
            } else {
                // $data_naik = 'Naik ' . abs($persen_saldo);
                $status_pengeluaran = '' . abs($persen_saldo_pengeluaran);
                $data_persen_pengeluaran = '2';
            }
            $data_kas->persentase_seluruh_buku_kas = $data_persen;
            $data_kas->keterangan_seluruh_buku_kas =  $status;
            //Pemasukan
            $data_kas->persen_seluruh_pemasukan = $data_persen_pemasukan;
            $data_kas->keterangan_seluruh_pemasukan = $status_pemasukan;
            //Pengeluaran
            $data_kas->persen_seluruh_pengeluaran = $data_persen_pengeluaran;
            $data_kas->keterangan_seluruh_pengeluaran = $status_pengeluaran;
            $data_kas->pemasukan =  CatatanBuku::where('id_user', '=', $user_id)->where('idx_kategori', '1')->sum('catatan_jumlah');
            $data_kas->pengeluaran = CatatanBuku::where('id_user', '=', $user_id)->where('idx_kategori', '2')->sum('catatan_jumlah');
                //END SEMUA KAS
        } else {    
            # code...
            //PER ID KAS
            $data_kas->total_saldo = Buatbuku::where('id', '=', $user_id)->where('idx_buku_kas','=',$request->idx_buku_kas)->where('status', '=', 'aktif')->sum('buku_saldo');
            $data_kas->saldo = Buatbuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $request->idx_buku_kas)->where('status', '=', 'aktif')->sum('buku_saldo');
            
            $hasilpemasukan = CatatanBuku::where('id_user', '=', $user_id)->where('idx_buku_kas', '=', $request->idx_buku_kas)->where('idx_kategori', '=', 1)->sum('catatan_jumlah');
            $hasilpengeluaran = CatatanBuku::where('id_user', '=', $user_id)->where('idx_buku_kas', '=', $request->idx_buku_kas)->where('idx_kategori', '=', 2)->sum('catatan_jumlah');
            $saldo_awal = BuatBuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $request->idx_buku_kas)->sum('buku_saldo_awal');
            $saldo_akhir = BuatBuku::where('id', '=', $user_id)->where('idx_buku_kas', '=', $request->idx_buku_kas)->sum('buku_saldo');
            //buku kas
            $hasil = (($saldo_awal - $saldo_akhir) / $saldo_awal) * (100/100);
            $persen_saldo = number_format($hasil, 1);
            //pemasukan
            $hasilpemasukan = (($saldo_awal - $hasilpemasukan) / $saldo_awal) * (100 / 100);
            $persen_saldo_pemasukan = number_format($hasilpemasukan, 1);
            // Pengeluaran
            $hasilpengeluaran = (($saldo_awal - $hasilpengeluaran) / $saldo_awal) * (100 / 100);
            $persen_saldo_pengeluaran = number_format($hasilpengeluaran, 1);
            //persentase
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
            //persentase pemasukan
            if ($saldo_awal > $hasilpemasukan) {
                # code...
                // $data_turun = 'Turun ' . $persen_saldo;
                $status_pemasukan = '0';
                $data_persen_pemasukan = '' . $persen_saldo_pemasukan;
            } elseif ($saldo_awal == $hasilpemasukan
            ) {
                $status_pemasukan = '1';
                $data_persen_pemasukan = '' . $persen_saldo_pemasukan;
            } else {
                // $data_naik = 'Naik ' . abs($persen_saldo);
                $status_pemasukan = '' . abs($persen_saldo_pemasukan);
                $data_persen_pemasukan = '2';
            }
            //persentase pengeluaran
            if ($saldo_awal > $hasilpengeluaran) {
                # code...
                // $data_turun = 'Turun ' . $persen_saldo;
                $status_pengeluaran = '0';
                $data_persen_pengeluaran = '' . $persen_saldo_pengeluaran;
            } elseif ($saldo_awal == $hasilpengeluaran
            ) {
                $status_pengeluaran = '1';
                $data_persen_pengeluaran = '' . $persen_saldo_pengeluaran;
            } else {
                // $data_naik = 'Naik ' . abs($persen_saldo);
                $status_pengeluaran = '' . abs($persen_saldo_pengeluaran);
                $data_persen_pengeluaran = '2';
            }
            //Pemasukan
            $data_kas->persen_seluruh_pemasukan = $data_persen_pemasukan;
            $data_kas->keterangan_seluruh_pemasukan = $status_pemasukan;
            //Pengeluaran
            $data_kas->persen_seluruh_pengeluaran = $data_persen_pengeluaran;
            $data_kas->keterangan_seluruh_pengeluaran = $status_pengeluaran;
            $data_kas->persentase = $data_persen;
            $data_kas->keterangan =  $status;
            $data_kas->pemasukan =  CatatanBuku::where('id_user', '=', $user_id)->where('idx_kategori', '1')->sum('catatan_jumlah');
            $data_kas->pengeluaran = CatatanBuku::where('id_user', '=', $user_id)->where('idx_kategori', '2')->sum('catatan_jumlah');
        }
        return $data_kas;
    }

    public function getbukukasId($idx_buku_kas,$user_id)
    {
        $id_buku_kas = BuatBuku::where('id','=',$user_id)->where('idx_buku_kas','=',$idx_buku_kas)->sum('buku_saldo');
        return $id_buku_kas;
    }
}
