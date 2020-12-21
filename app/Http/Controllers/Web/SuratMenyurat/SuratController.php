<?php

namespace App\Http\Controllers\Web\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * DB Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;
use App\Dashboard\HutangPiutang\Hutang;
use App\Dashboard\HutangPiutang\Piutang;

class SuratController extends Controller
{
    public function suratindex()
    {
        /**
         * sidebar Buku kas
         */

        return view('dashboard.surat-menyurat.surat-menyurat');
    }
}