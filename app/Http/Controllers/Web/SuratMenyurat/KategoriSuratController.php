<?php

namespace App\Http\Controllers\Web\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * DB Model Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;

class KategoriSuratController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        // dd($user_id);
        $jenis_kategori = Model_Kategori::all();
        $isi_kategori = Model_Sub_Kategori::with('Model_Kategori')->where('tbl_sub_kategori.status', '=', 'aktif')->where('user_id', '=', $user_id)->get();
        // dd($isi_kategori);
        return view('dashboard.surat-menyurat.surat-kategori', compact('isi_kategori', 'user_id'));
    }
    public function show()
    {
    }
    public function editkategori($idx_sub_kat)
    {
        // dd($kategori->all());
        $edit_kategori = Model_Sub_Kategori::find($idx_sub_kat);
        return view('dashboard.surat-menyurat.edit-kategori', compact('edit_kategori'));
    }
    public function store(Request $request)
    {

        try {
            //code...
            $exp = explode(',', $request->kategori);
            for ($i = 0; $i < count($exp); $i++) {
                # code...
                $data_kategori = [
                    'idx_kategori' => $request->idx_kategori,
                    'sub_nama' => $exp[$i],
                    'user_id' => $request->user_id,
                ];
                Model_Sub_Kategori::insert($data_kategori);
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }
    public function updatekategori(Request $request, $idx_sub_kat)
    {
        $user_id = Auth::id();
        try {
            //code...
            $exp = explode(',', $request->kategori);
            for ($i = 0; $i < count($exp); $i++) {
                # code...
                if ($i == 0) {
                    # code...
                    Model_Sub_Kategori::where('idx_sub_kat', $idx_sub_kat)->update([
                        'sub_nama' => $exp[$i],
                        'user_id' => $user_id,
                    ]);
                } else {
                    $data_kategori = [
                        'idx_kategori' => $request->idx_kategori,
                        'sub_nama' => $exp[$i],
                        'user_id' => $user_id,
                    ];
                    Model_Sub_Kategori::insert($data_kategori);
                }
            }

            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
    }
    public function create()
    {
    }
    public function destroy($idx_sub_kat)
    {
        Model_Sub_Kategori::where('idx_sub_kat', '=', $idx_sub_kat)->update(['status' => 'non-aktif']);
        return redirect()->back();
    }
}