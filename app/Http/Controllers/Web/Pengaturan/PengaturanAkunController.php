<?php

namespace App\Http\Controllers\Web\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * DB Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;
use App\User;
use Illuminate\Support\Facades\Auth;

class PengaturanAkunController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        return view('dashboard.pengaturan.pengaturan-akun',compact('user_id'));
    }
}