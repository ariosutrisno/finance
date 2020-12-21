<?php

namespace App\Http\Controllers\Web\BukuKas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * DB Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;

class CariTransaksiController extends Controller
{
    public function indextransaksi()
    {
        // $cari_transaksi = CariTransaksi::all();
        // // $data = ['1', '2', '3',];
        // // dd($dompetPribadi);
        // $hitung = $cari_transaksi->sum('transaksi_kas');
        // dd($hitung);
        $sidebardompet = BuatBuku::all();
        return view('dashboard.buku-kas.caritransaksi', compact('sidebardompet'));
    }
}