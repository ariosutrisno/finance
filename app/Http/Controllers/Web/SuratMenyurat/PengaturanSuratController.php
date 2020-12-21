<?php

namespace App\Http\Controllers\Web\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanSuratController extends Controller
{
    public function index()
    {
        return view('dashboard.surat-menyurat.surat-set');
    }
}