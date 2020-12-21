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
use App\Dashboard\HutangPiutang\Hutang;

class HutangController extends Controller
{
    public function index()
    {

        $id_user = Auth::id();
        /**
         * sidebar Buku kas
         */

        $sidebardompet = BuatBuku::all();
        /**
         * data tampilan ke table
         */
        $hutang_data = Hutang::where('hutang.status', '=', 'aktif')->where('user_id', '=', $id_user)->get();
        
        $mata_uang_jumlah = BuatBuku::where('id','=',$id_user)->where('status','=','aktif')->first('buku_mata_uang');
        
        /**
         * hitung semua jumlah nominal hutang
         */
        $hutang_jumlah = $hutang_data->sum('hutang_nominal');
        /**
         * data jumlah hutang nominal jika 0
         */
        $hitung = 0;
        if (!empty($hutang_data)) {
            # code...
            $hitung = $hutang_jumlah;
        } else {
            # code...
            $hitung;
        }
        /**
         * pilihan buku kas
         */
        $tbl_buku_kas = BuatBuku::where('id','=',$id_user)->where('status','=','aktif')->get();
        /**
         *  Model Sub Kategori
         */
        $model_sub_kategori = Model_Sub_Kategori::where('status', 'aktif')->get();
        return view('dashboard.hutang-piutang.hutang', compact('hutang_data', 'hutang_jumlah', 'hitung', 'sidebardompet', 'tbl_buku_kas', 'model_sub_kategori', 'id_user', 'mata_uang_jumlah'));
    }
    public function posthutang(Request $request)
    {
        $user_id = Auth::id();
        $select_buku = $request->selectedBuku;
        $kategori = $request->idx_kategori;
        $carbon =  \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i');    
        $hutang_save = Hutang::insert([
            'user_id'=>$user_id,
            'idx_kategori' => $request->idx_kategori,
            'hutang_tanggal' => $request->hutang_tanggal,
            'hutang_jatuh' => $request->hutang_jatuh,
            'hutang_client' => $request->hutang_client,
            'hutang_deskripsi' => $request->hutang_deskripsi,
            'hutang_nominal' => $request->hutang_nominal,
        ]);
        $idx_hutang = DB::getPdo()->lastInsertId();
        
        if ($kategori) {
            # code...
            if ($select_buku == 0) {
                # code...
                $hutang_save;
            } else {
                # code...
                $BukuKas = BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->first();
                CatatanBuku::insert([
                    'id_user' => $user_id,
                    'idx_hutang'=> $idx_hutang,
                    'idx_kategori' => $request->idx_kategori,
                    'idx_buku_kas' => $request->idx_buku_kas,
                    'idx_sub_kategori' => $request->idx_sub_kategori,
                    'catatan_keterangan' => $request->hutang_deskripsi,
                    'catatan_tgl' => $request->hutang_tanggal,
                    'catatan_jumlah' => $request->hutang_nominal,
                    'catatan_jam' => $carbon,
                ]);
                $nominal = $BukuKas->buku_saldo += $request->hutang_nominal;
                $BukuKas->buku_saldo = $nominal;
                $BukuKas->save();
            }
        } 
        
        return redirect()->back();
        
        
    }

    public function showhutang($idx_hutang)
    {
        $hutang = Hutang::find($idx_hutang);
        return view('dashboard.hutang-piutang.lihathutangdetail', compact('hutang'));
    }

    public function update(Request $request, $idx_hutang)
    {

        $id_user = Auth::id();
        $select_buku = $request->selectedBuku;
        $kategori = $request->idx_kategori;
        $nominal_lama = $request->hutang_nominal_lama;
        if ($kategori == 1) {
            # code...
            if ($select_buku == 0) {
                # code...
                // exit;
                Hutang::where('idx_hutang', $idx_hutang)->update([
                    'user_id' => $request->user_id,
                    'idx_kategori' => $request->idx_kategori,
                    'hutang_tanggal' => $request->hutang_tanggal,
                    'hutang_jatuh' => $request->hutang_jatuh,
                    'hutang_client' => $request->hutang_client,
                    'hutang_deskripsi' => $request->hutang_deskripsi,
                    'hutang_nominal' => $request->hutang_nominal,
                ]);
            } else {
                # code..
                $carbon =  \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i');
                $BukuKas = BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->first();
                $catatan_buku = CatatanBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->where('idx_hutang', '=', $request->idx_hutang)->count();
                if ($catatan_buku == "true") {
                    # code...
                    Hutang::where('idx_hutang', $idx_hutang)->update([
                        'user_id' => $request->user_id,
                        'idx_kategori' => $request->idx_kategori,
                        'hutang_tanggal' => $request->hutang_tanggal,
                        'hutang_jatuh' => $request->hutang_jatuh,
                        'hutang_client' => $request->hutang_client,
                        'hutang_deskripsi' => $request->hutang_deskripsi,
                        'hutang_nominal' => $request->hutang_nominal,
                    ]);

                    # code...
                    CatatanBuku::insert([
                        'id_user' => $id_user,
                        'idx_hutang' => $request->idx_hutang,
                        'idx_kategori' => $request->idx_kategori,
                        'idx_buku_kas' => $request->idx_buku_kas,
                        'idx_sub_kategori' => $request->idx_sub_kategori,
                        'catatan_keterangan' => $request->hutang_deskripsi,
                        'catatan_tgl' => $request->hutang_tanggal,
                        'catatan_jumlah' => $request->hutang_nominal,
                        'catatan_jam' => $carbon,
                    ]);
                }else{
                    Hutang::where('idx_hutang', $idx_hutang)->update([
                        'user_id' => $request->user_id,
                        'idx_kategori' => $request->idx_kategori,
                        'hutang_tanggal' => $request->hutang_tanggal,
                        'hutang_jatuh' => $request->hutang_jatuh,
                        'hutang_client' => $request->hutang_client,
                        'hutang_deskripsi' => $request->hutang_deskripsi,
                        'hutang_nominal' => $request->hutang_nominal,
                    ]);
                    $data_update = [
                        'idx_hutang' => $request->idx_hutang,
                        'idx_kategori' => $request->idx_kategori,
                        'idx_buku_kas' => $request->idx_buku_kas,
                        'idx_sub_kategori' => $request->idx_sub_kategori,
                        'catatan_keterangan' => $request->hutang_deskripsi,
                        'catatan_tgl' => $request->hutang_tanggal,
                        'catatan_jumlah' => $request->hutang_nominal,
                        'catatan_jam' => $carbon,
                    ];
                    CatatanBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->where('id_user','=',$id_user)->where('idx_hutang', '=', $request->idx_hutang)->update($data_update);
                }
                $nominal =  $BukuKas->buku_saldo += $request->hutang_nominal;
                $BukuKas->buku_saldo = $nominal;
                $BukuKas->save();
            }
        }
        
    }

    public function edit(Hutang $hutang, $idx_hutang)
    {

        /**
         * HUTANG
         */
        $hutang = Hutang::find($idx_hutang);
        /**
         * kategori
         */
        $model_sub_kategori = Model_Sub_Kategori::all();
        $sub_kategori = Model_Sub_Kategori::find($idx_hutang);
        /**
         * Buku Kas yang di pilih 
         */
        $id_user = Auth::id();
        $tbl_buku_kas = BuatBuku::where('id', '=', $id_user)->where('status', '=', 'aktif')->get();
        return view('dashboard.hutang-piutang.edithutang', compact('hutang', 'tbl_buku_kas', 'model_sub_kategori', 'sub_kategori'));
    }
    public function destroyhutang($idx_hutang)
    {
        // dd($idx_hutang);
        Hutang::where('idx_hutang', '=', $idx_hutang)->update(['status' => 'non-aktif']);
        return redirect()->back();
    }
    public function searchHutang(Request $request)
    {
        $id = Auth::id();
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = Hutang::where('user_id',$id)->where('status','=','aktif')->where('hutang_tanggal', 'like', '%' . $query . '%')
                    ->orWhere('hutang_client', 'like', '%' . $query . '%')
                    ->orWhere('hutang_deskripsi', 'like', '%' . $query . '%')
                    ->orWhere('hutang_nominal', 'like', '%' . $query . '%')
                    ->orderBy('idx_hutang', 'desc')
                    ->get();
            } else {
                $data = Hutang::where('user_id',$id)->where('status','=','aktif')->orderBy('idx_hutang', 'asc')
                    ->get();
            }
        }
        echo json_encode($data);
    }
    public function listHutang(Request $request){
        $list_data = $request->list_jumlah;
        // dd($dd);
        if ($request->ajax()) {
            # code...
            $list_data = Hutang::where('status', '=', 'aktif')->limit($list_data)->get();
            echo json_encode($list_data);
        }
    }
}