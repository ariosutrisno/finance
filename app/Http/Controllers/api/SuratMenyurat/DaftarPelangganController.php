<?php

namespace App\Http\Controllers\api\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\DaftarPelanggan;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
class DaftarPelangganController extends ApiController
{
    protected $pelanggan;

    public function __construct(DaftarPelanggan $pelanggan)
    {
        $this->pelanggan = $pelanggan;
    }
    public function index()
    {
        $user_id = Auth::id();
        $allpelanggan = $this->pelanggan->getAll($user_id);
        if (collect($allpelanggan)->count()  > 0) {
            return $this->sendResponse(0, 19, $allpelanggan);
        } elseif ($allpelanggan->count() == 0) {
            return $this->sendResponse(0, 'Data kosong');
        }  else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function create(Request $request)
    {
        $user_id = Auth::id();
        $thisdata = [
            'pelanggan_nama'=>$request->pelanggan_nama,
            'pelanggan_alamat'=>$request->pelanggan_alamat,
            'pelanggan_telepon'=>$request->pelanggan_telepon,
            'pelanggan_email'=>$request->pelanggan_email,
            'perusahaan'=>$request->perusahaan,
        ];
        unset($thisdata['created_at']);
        unset($thisdata['updated_at']);
        $createPelanggan = $this->pelanggan->create($thisdata,$user_id);
        if (collect($createPelanggan)) {
            return $this->sendResponse(0, 19, $thisdata);
        } else {
            return $this->sendError(2, 'Error');
        }
    }
    public function updatepelanggan(Request $request,$idx_pelanggan)
    {
        $user_id = Auth::id();
        $thisdata = [
            'idx_pelanggan'=>$request->idx_pelanggan,
            'pelanggan_nama' => $request->pelanggan_nama,
            'pelanggan_alamat' => $request->pelanggan_alamat,
            'pelanggan_telepon' => $request->pelanggan_telepon,
            'pelanggan_email' => $request->pelanggan_email,
            'perusahaan' => $request->perusahaan,
        ];
        unset($thisdata['created_at']);
        unset($thisdata['updated_at']);
        $createPelanggan = $this->pelanggan->update($request, $idx_pelanggan,$thisdata, $user_id);
        if (collect($createPelanggan)) {
            return $this->sendResponse(0, 19, $thisdata);
        } else {
            return $this->sendError(2, 'Error');
        }
    }
    public function delete($idx_pelanggan)
    {
        $user_id = Auth::id();
        $createPelanggan = $this->pelanggan->deletepelanggan($idx_pelanggan,$user_id);
        if (collect($createPelanggan)) {
            return $this->sendResponse(0, 19, ['data terhapus']);
        } else {
            return $this->sendError(2, 'Error');
        }
    }
}
