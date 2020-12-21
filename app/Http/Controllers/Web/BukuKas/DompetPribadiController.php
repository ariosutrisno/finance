<?php

namespace App\Http\Controllers\Web\BukuKas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * DB Model Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;

class DompetPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdompet()
    {
        $id = Auth::id();
        // dd($id);
        $sidebardompet = BuatBuku::where('id', '=', $id)->where('status', '=', 'aktif')->get();

        return view('dashboard.buku-kas.buku', compact('sidebardompet'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function dompetstore(Request $request)
    {
        /**
         * hitung saldo buku kas
         */
        $id_user = Auth::id();
        $id_dompet = $request->idx_buku_kas;
        try {
            //code...
            $jenis_kategori = $request->idx_kategori;
            $BukuKas = BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->first();
            if ($jenis_kategori == 1) {
                # code...
                CatatanBuku::insert([
                    'id_user' => $id_user,
                    'idx_buku_kas' => $id_dompet,
                    'idx_kategori' => $request->idx_kategori,
                    'idx_sub_kategori' => $request->idx_sub_kategori,
                    'idx_piutang' => $request->idx_piutang,
                    'idx_hutang' => $request->idx_hutang,
                    'catatan_jumlah' => $request->catatan_jumlah,
                    'catatan_jam' => $request->catatan_jam,
                    'catatan_tgl' => $request->catatan_tgl,
                    'catatan_keterangan' => $request->catatan_keterangan,
                ]);
                $BukuKas->buku_saldo += $request->catatan_jumlah;
            } else {
                # code...
                CatatanBuku::insert([
                    'id_user' =>$id_user,
                    'idx_buku_kas' => $id_dompet,
                    'idx_kategori' => $request->idx_kategori,
                    'idx_sub_kategori' => $request->idx_sub_kategori,
                    'idx_piutang' => $request->idx_piutang,
                    'idx_hutang' => $request->idx_hutang,
                    'catatan_jumlah' => $request->catatan_jumlah,
                    'catatan_jam' => $request->catatan_jam,
                    'catatan_tgl' => $request->catatan_tgl,
                    'catatan_keterangan' => $request->catatan_keterangan,
                ]);
                $pengeluaran = $BukuKas->buku_saldo - $request->catatan_jumlah;
                $BukuKas->buku_saldo = $pengeluaran;
            }

            $BukuKas->save();
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdompet(Request $request, $idx_catatan_buku)
    {
        /**
         * ID Dari buku kas
         */
        
        $sidebardompet = BuatBuku::all();
        $dompet = BuatBuku::find($idx_catatan_buku);

        /**
         * data yang di tampilkan ke table
         */
        $id = Auth::id();
        $model_sub_kategori = Model_Sub_Kategori::where('status','=','aktif')->get();
        $dompet_table = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('tbl_catatan_buku.status', '=', 'aktif')->where('tbl_catatan_buku.idx_buku_kas', '=', $idx_catatan_buku)->orderBy('catatan_tgl','desc')->paginate(10);
        $dompet_saldo = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('tbl_catatan_buku.status', '=', 'aktif')->first();

        /**
         * jika saldo 0 && perhitungan
         */
        $hitung = 0;
        if (!empty($dompet)) {
            # code...
            $hitung = $dompet->buku_saldo;
        } else {
            # code...
            $hitung;
        }
        /**
         * ID Buku Kas
         */
        $id_dompet = $idx_catatan_buku;
    
        
        return view('dashboard.buku-kas.dompetpribadi', compact('sidebardompet',  'id_dompet', 'dompet', 'dompet_table', 'model_sub_kategori', 'hitung','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** EDIT PEMASUKAN */
    public function editdompetpemasukan(CatatanBuku $catatabuku, $idx_catatan_buku)
    {
        /**
         * Model Sub Kategori
         */
        $id_user = Auth::id();
        $model_sub_kategori = Model_Sub_Kategori::where('idx_kategori', '=', '1')->where('status', 'aktif')->get();
        $sub_kategori = CatatanBuku::where('idx_catatan_buku', '=', $idx_catatan_buku)->get('idx_sub_kategori');
        
        /**
         * Data Edit Buku Kas
         */
        $data_dompet = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('tbl_catatan_buku.status', '=', 'aktif')->find($idx_catatan_buku);
        return view('dashboard.buku-kas.editdompet', compact('data_dompet', 'model_sub_kategori','id_user'));
    }
    /** EDIT PENGELUARAN */
    public function editdompetpengeluaran(CatatanBuku $catatabuku, $idx_catatan_buku)
    {
        /**
         * Model Sub Kategori
         */
        $id = Auth::id();
        $model_sub_kategori = Model_Sub_Kategori::where('idx_kategori','=', '2')->where('status','aktif')->get();
        /**
         * Data Edit Buku Kas
         */
        $data_dompet = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('tbl_catatan_buku.status', '=', 'aktif')->find($idx_catatan_buku);
        return view('dashboard.buku-kas.editdompet', compact('data_dompet', 'model_sub_kategori','id_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedompet(Request $request, $idx_catatan_buku)
    {
        
        $id_user = Auth::id();
        $nominal_lama = $request->catatan_jumlah_lama;
        $jenis_kategori = $request->idx_kategori;
        $BukuKas = BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->first();
        
        if ($jenis_kategori == '1') {
            # code...
            CatatanBuku::where('idx_catatan_buku', $idx_catatan_buku)->update([
                'id_user' => $id_user,
                'idx_buku_kas' => $request->idx_buku_kas,
                'idx_kategori' => $request->idx_kategori,
                'idx_sub_kategori' => $request->idx_sub_kategori,
                'catatan_jumlah'=>$request->catatan_jumlah,
                'catatan_jam' => $request->catatan_jam,
                'catatan_tgl' => $request->catatan_tgl,
                'catatan_keterangan' => $request->catatan_keterangan,
            ]);
            $nominal = $BukuKas->buku_saldo +=  $request->catatan_jumlah -= $nominal_lama;
            $BukuKas->buku_saldo = $nominal;
            $data = ['buku_saldo' => $nominal];
            BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->update($data);
        } else {
            # code...
            CatatanBuku::where('idx_catatan_buku', $idx_catatan_buku)->update([
                'id_user' => $id_user,
                'idx_buku_kas' => $request->idx_buku_kas,
                'idx_kategori' => $request->idx_kategori,
                'idx_sub_kategori' => $request->idx_sub_kategori,
                'catatan_jumlah' => $request->catatan_jumlah,
                'catatan_jam' => $request->catatan_jam,
                'catatan_tgl' => $request->catatan_tgl,
                'catatan_keterangan' => $request->catatan_keterangan,
            ]);
        $nominal = $BukuKas->buku_saldo -=  $request->catatan_jumlah -= $nominal_lama;
        $BukuKas->buku_saldo=$nominal;
            $data = ['buku_saldo' => $nominal];
            BuatBuku::where('idx_buku_kas', '=', $request->idx_buku_kas)->update($data);
            
        }
        // // $BukuKas->save();
        // return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroydompet($idx_catatan_buku)
    {
        
        $id_kas = url()->previous();
        $exp = explode('/', $id_kas);
        $dd= $exp[count($exp)-1];
        $buku_saldo = BuatBuku::where('idx_buku_kas','=', $dd)->first('buku_saldo');
        $catatan_jumlah = CatatanBuku::where('idx_catatan_buku', '=', $idx_catatan_buku)->first('catatan_jumlah');
        $kategori = CatatanBuku::where('idx_catatan_buku', '=', $idx_catatan_buku)->first('idx_kategori');
        $id_kategori = $kategori->idx_kategori;
        $aa = $buku_saldo->buku_saldo;
        $bb = $catatan_jumlah->catatan_jumlah;
        $hasilpengeluaran = $aa + $bb;
        $hasilpemasukan = $aa - $bb;
        if ($id_kategori == 1) {
            # code...
            BuatBuku::where('idx_buku_kas', '=', $dd)->update(['buku_saldo'=>$hasilpemasukan]);
            CatatanBuku::with('BuatBuku')->where('idx_catatan_buku', '=', $idx_catatan_buku)->update(['status' => 'non-aktif']);
        } else {
            # code...
            BuatBuku::where('idx_buku_kas', '=', $dd)->update(['buku_saldo' => $hasilpengeluaran]);
            CatatanBuku::with('BuatBuku')->where('idx_catatan_buku', '=', $idx_catatan_buku)->update(['status' => 'non-aktif']);
        }
        
        return redirect()->back();
    }

    public function searchdompet(Request $request)
    {
        $id_kas = url()->previous();
        $exp = explode('/', $id_kas);
        $dd= $exp[count($exp)-1];
        //data pencarian
        $cari = $request->cari;
        $dompet_table = CatatanBuku::where('idx_sub_kategori','like','%'.$cari.'%')
            ->where('catatan_keterangan', 'like', '%' . $cari . '%')
            ->where('catatan_tgl', 'like', '%' . $cari . '%')
            ->where('catatan_jumlah', 'like', '%' . $cari . '%')
            ->paginate();
        return view('dashboard.buku-kas.dompetpribadi',compact('dompet_table'));
    }
    public function list(Request $request){
        $list_data= $request->list_jumlah;
    
        
        
    }
}