<?php

namespace App\Http\Controllers\Web\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * DB Model Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;

class PengaturanKategoriController extends Controller
{
    public function index()
    {
        return view('dashboard.pengaturan.pengaturan-kategori');
    }
}