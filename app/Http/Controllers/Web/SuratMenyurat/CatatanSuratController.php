<?php

namespace App\Http\Controllers\Web\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatatanSuratController extends Controller
{
    public function indexsurat()
    {
        return view('dashboard.surat-menyurat.surat-catatan');
    }
}