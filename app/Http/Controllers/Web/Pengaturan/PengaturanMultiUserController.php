<?php

namespace App\Http\Controllers\Web\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanMultiUserController extends Controller
{
    public function index()
    {
        return view('dashboard.pengaturan.pengaturan-multiUser');
    }
}