<?php

namespace App\Http\Controllers\Web\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dashboard\SuratMenyurat\BuatSurat;

class BuatSuratController extends Controller
{
    public function index()
    {
        // $BuatSurat = BuatSurat::all();
        // $Jumlah_Surat = BuatSurat::count();
        // // dd($BuatSurat);
        // $hitung = 0;
        // if (!empty($BuatSurat)) {
        //     # code...
        //     $hitungInit  = BuatSurat::all()->last();
        //     $hitung = $hitungInit->saldo_surat;
        // } else {
        //     if ($hitung > 0) {
        //         # code...
        //         $hitung = 0;
        //     }
        // }
        return view('dashboard.surat-menyurat.surat-buat',);
    }
}