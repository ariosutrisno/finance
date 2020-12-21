<?php

namespace App\Http\Controllers\api\bukukas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\BukuKasRepository;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
/**
 * DB alan
 */
use App\Dashboard\BukuKas\BuatBuku;
class bukuController extends ApiController
{
    protected $bukukas;

    public function __construct(BukuKasRepository $bukukas)
    {
        $this->bukukas = $bukukas;
    }
    public function createform(Request $request)
    {
        $id_user = Auth::user()->id;
        $thisData = [
            'id' => $id_user,
            'buku_nama' => $request->buku_nama,
            'buku_deskripsi' => $request->buku_deskripsi,
            'buku_saldo_awal' => $request->buku_saldo_awal,
            'buku_mata_uang' => $request->buku_mata_uang,
            'buku_saldo' => $request->buku_saldo,
        ];
        $save_kas = $this->bukukas->createkas($id_user,$thisData);
        if ($save_kas) {
            return $this->sendResponse(0, "Berhasil", $thisData);
        } else {
            return $this->sendError(2, 'Error');
        }
    }

    public function list()
    {
        $user_id = Auth::id();
        $getliskas = $this->bukukas->listkas($user_id);
        if (collect($getliskas)->count()) {
            return $this->sendResponse(0, 19, $getliskas);
        } else {
            return $this->sendResponse(0, 19,[]);
        }
    }

}
