<?php

namespace App\Http\Controllers\Web\HutangPiutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
/**
 * DB Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;
use App\Dashboard\HutangPiutang\Piutang;


class PiutangController extends Controller
{
    public function index()
    {
        /**
         * USER ID
         */
        $user_id = Auth::id();
        $mata_uang = BuatBuku::where('id', '=', $user_id)->where('status', '=', 'aktif')->first();
        /**
         * sidebar dompet
         */
        $sidebardompet = BuatBuku::all();
        /**
         * data yang tampil di table
         */
        $piutang_data = Piutang::where('piutang.status', '=', 'aktif')->where('user_id', '=', $user_id)->get();
        /**
         * jumlah nominal piutang
         */
        $piutang_jumlah = $piutang_data->sum('piutang_nominal');
        /**
         * data dompet
         */
        $tbl_buku_kas = BuatBuku::where('id', '=', $user_id)->where('status', '=', 'aktif')->get();
        /**
         * jika jumlah nomninal 0
         */
        $hitung = 0;
        if (!empty($piutang_data)) {
            # code...
            $hitung = $piutang_jumlah;
        } else {
            # code...
            $hitung;
        }
        /**
         * 
         *  Model Sub Kategori
         */
        $model_sub_kategori = Model_Sub_Kategori::all();
        return view('dashboard.hutang-piutang.piutang', compact('piutang_data', 'piutang_jumlah', 'hitung', 'sidebardompet', 'tbl_buku_kas', 'model_sub_kategori', 'user_id', 'mata_uang'));
    }

    public function postPiutang(Request $request)
    {
        $seleted_buku = $request->selectedBuku;
        $kategori = $request->idx_kategori;
        $id_user = Auth::id();
        $data = [
            'user_id' => $request->user_id,
            'idx_kategori' => $request->idx_kategori,
            'piutang_tanggal' => $request->piutang_tanggal,
            'piutang_jatuh' => $request->piutang_jatuh,
            'piutang_client' => $request->piutang_client,
            'piutang_deskripsi' => $request->piutang_deskripsi,
            'piutang_nominal' => $request->piutang_nominal,
        ];
        $simpan_data = Piutang::insert($data);
        $idx_piutang = DB::getPdo()->lastInsertId();
        $carbon =  \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i');
        if ($kategori) {
            # code...
            if ($seleted_buku == 0) {
                # code...
                $simpan_data;
            } else {
                # code...
                $carbon =  \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i');
                $BukuKas = BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->first();
                CatatanBuku::insertGetId([
                    'id_user' => $id_user,
                    'idx_piutang' => $idx_piutang,
                    'idx_kategori' => $request->idx_kategori,
                    'idx_buku_kas' => $request->idx_buku_kas,
                    'idx_sub_kategori' => $request->idx_sub_kategori,
                    'catatan_keterangan' => $request->piutang_deskripsi,
                    'catatan_tgl' => $request->piutang_tanggal,
                    'catatan_jumlah' => $request->piutang_nominal,
                    'catatan_jam' => $carbon,
                ]);
                $nominal = $BukuKas->buku_saldo -= $request->piutang_nominal;
                $BukuKas->buku_saldo = $nominal;
                $BukuKas->save();
            }
        }
        return redirect()->back();
        
        
    }
    public function update(Request $request, $idx_piutang)
    {
        // dd($request->all());
        $select_buku = $request->selectedBuku;
        $kategori = $request->idx_kategori;
        $nominal_lama = $request->hutang_nominal_lama;
        $id_user = Auth::id();
       

        if ($kategori) {
            # code...
            if ($select_buku == 0) {
                # code..
                Piutang::where('idx_piutang', $idx_piutang)->update([
                    'user_id' => $request->user_id,
                    'idx_kategori' => $request->idx_kategori,
                    'piutang_tanggal' => $request->piutang_tanggal,
                    'piutang_jatuh' => $request->piutang_jatuh,
                    'piutang_client' => $request->piutang_client,
                    'piutang_deskripsi' => $request->piutang_deskripsi,
                    'piutang_nominal' => $request->piutang_nominal,
                ]);
            } else {
                # code..
                $carbon =  \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i');
                $BukuKas = BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->first();
                $catatan_buku = CatatanBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->where('idx_piutang', '=', $request->idx_piutang)->count();
                if ($catatan_buku == "true") {
                    # code...
                    Piutang::where('idx_piutang', $idx_piutang)->update([
                        'user_id' => $request->user_id,
                        'idx_kategori' => $request->idx_kategori,
                        'piutang_tanggal' => $request->piutang_tanggal,
                        'piutang_jatuh' => $request->piutang_jatuh,
                        'piutang_client' => $request->piutang_client,
                        'piutang_deskripsi' => $request->piutang_deskripsi,
                        'piutang_nominal' => $request->piutang_nominal,
                    ]);
                    # code...
                    CatatanBuku::insert([
                        'id' => $id_user,
                        'idx_piutang' => $request->idx_piutang,
                        'idx_kategori' => $request->idx_kategori,
                        'idx_buku_kas' => $request->idx_buku_kas,
                        'idx_sub_kategori' => $request->idx_sub_kategori,
                        'catatan_keterangan' => $request->piutang_deskripsi,
                        'catatan_tgl' => $request->piutang_tanggal,
                        'catatan_jumlah' => $request->piutang_nominal,
                        'catatan_jam' => $carbon,
                    ]);
                } else {
                    Piutang::where('idx_piutang', $idx_piutang)->update([
                        'user_id' => $request->user_id,
                        'idx_kategori' => $request->idx_kategori,
                        'piutang_tanggal' => $request->piutang_tanggal,
                        'piutang_jatuh' => $request->piutang_jatuh,
                        'piutang_client' => $request->piutang_client,
                        'piutang_deskripsi' => $request->piutang_deskripsi,
                        'piutang_nominal' => $request->piutang_nominal,
                    ]);
                    $data_update = [
                        'idx_piutang' => $request->idx_piutang,
                        'idx_kategori' => $request->idx_kategori,
                        'idx_buku_kas' => $request->idx_buku_kas,
                        'idx_sub_kategori' => $request->idx_sub_kategori,
                        'catatan_keterangan' => $request->piutang_deskripsi,
                        'catatan_tgl' => $request->piutang_tanggal,
                        'catatan_jumlah' => $request->piutang_nominal,
                        'catatan_jam' => $carbon,
                    ];
                    CatatanBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->where('id_user','=',$id_user)->where('idx_piutang', '=', $request->idx_piutang)->update($data_update);
                }
                $nominal =  $BukuKas->buku_saldo -= $request->piutang_nominal += $nominal_lama;
                $BukuKas->buku_saldo = $nominal;
                $BukuKas->save();
            }
        }
    }
    public function editpiutang(Piutang $piutang, $idx_piutang)
    {
        $id_user = Auth::id();
        $piutang = Piutang::find($idx_piutang);
        $tbl_buku_kas = BuatBuku::where('id', '=', $id_user)->where('status', '=', 'aktif')->get();
        /**
         *  Model Sub Kategori
         */
        $model_sub_kategori = Model_Sub_Kategori::all();
        return view('dashboard.hutang-piutang.editpiutang', compact('piutang', 'tbl_buku_kas', 'model_sub_kategori'));
    }
    public function destroypiutang($idx_piutang)
    {
        /**
         * hapus piutang
         */
        Piutang::where('idx_piutang', '=', $idx_piutang)->update(['status' => 'non-aktif']);
        return redirect()->back();
    }
    public function showpiutang($idx_piutang)
    {
        $piutang = Piutang::find($idx_piutang);
        return view('dashboard.hutang-piutang.lihatdetailpiutang', compact('piutang'));
    }
    /** SEARCH PIUTANG */
    public function searchPiutang(Request $request)
    {
    
        $id = Auth::id();
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = Piutang::where('piutang_tanggal', 'like', '%' . $query . '%')
                    ->orWhere('piutang_client', 'like', '%' . $query . '%')
                    ->orWhere('piutang_deskripsi', 'like', '%' . $query . '%')
                    ->orWhere('piutang_nominal', 'like', '%' . $query . '%')
                    ->orderBy('idx_piutang', 'desc')
                    ->get();
            } else {
                $data = Piutang::where('user_id', $id)->where('status', '=', 'aktif')->orderBy('idx_piutang', 'asc')
                    ->get();
            }
        }
        echo json_encode($data);
    }
    public function listpiutang(Request $request){
        $list_data = $request->list_jumlah;

        // dd($dd);
        if ($request->ajax()) {
            # code...
            $list_data = Piutang::where('status', '=', 'aktif')->limit($list_data)->get();
            echo json_encode($list_data);
        }
    }

}