<?php

namespace App\Http\Controllers\Web\TipeSurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dashboard\SuratMenyurat\Quotation;

use App\Dashboard\SuratMenyurat\DaftarPelanggan;

use App\Dashboard\SuratMenyurat\item;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Dashboard\BukuKas\BuatBuku;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time = \Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i');
        $user_id = auth::id();
        $quotation = Quotation::where('user_id','=',$user_id)->orderBy('tgl_quotation','asc')->where('status','=','aktif')->paginate(20);
        return view('dashboard.tipe-surat.QuotationLetter.index', compact('quotation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bulan_romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $Awal = 'ALAN-C';
        $noUrutAkhir = Quotation::max('nomor_surat');
        if ($noUrutAkhir) {
            $nomor_surat = sprintf("%03s", abs($noUrutAkhir) + 1) . '/' . $Awal . '/' . $bulan_romawi[date('m')] . '/' . date('Y');
        }
        $id_user = Auth::id();
        $daftar_pelanggan = DaftarPelanggan::where('user_id','=',$id_user)->get();
        
        return view('dashboard.tipe-surat.QuotationLetter.create',compact('daftar_pelanggan','nomor_surat'));
    }    

    /**
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth::id();
        
    $data = $request->all();
        Quotation::insert([
            'nomor_surat'=>$request->nomor_surat,
            'id_pelanggan'=>$request->name,
            'user_id'=>$user_id,
            'tgl_quotation'=>$request->dikirim,
            'tgl_jatuh_tempo'=>$request->tempo,
            'perihal'=>$request->perihal,
            'jumlah_pembayaran'=>$request->subtotal,
            'keterangan'=>$request->catatan,
    ]);
    $id_quotation = DB::getPdo()->lastInsertId();
    
    if (($data['np'] > 0)) {
        # code...
        foreach ($data['np'] as $key => $value) {
            # code...
            $data2= array(
                'id_quotation' => $id_quotation,
                'nama_project' => $data['np'][$key],
                'biaya_project' => $data['cp'][$key],
            );
            item::create($data2);
        }
    }
        return redirect('/quotation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        $quotation = Quotation::with('item')->where('id_quotation', $quotation)->first();
        
        return view('dashboard.tipe-surat.QuotationLetter.print',compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit($id_quotation)
    {
        $id_user = Auth::id();
        $quotation = Quotation::where('id_quotation','=',$id_quotation)->where('status','=','aktif')->where('user_id','=',$id_user)->first();
        $pelanggan = DaftarPelanggan::where('idx_pelanggan','=', $quotation->id_pelanggan)->where('user_id','=',$id_user)->first();
        $daftar_pelanggan = DaftarPelanggan::where('user_id', '=', $id_user)->get();
        $item = item::where('id_quotation','=',$id_quotation)->first();
        $itemget = item::where('id_quotation','=',$id_quotation)->get();
        // $json = json_encode($item);
        $jpembayaran = $quotation->jumlah_pembayaran;
        $ppn = $jpembayaran * 0.1;
        $total = $jpembayaran + $ppn;
        return view('dashboard.tipe-surat.QuotationLetter.edit',compact('quotation','pelanggan','daftar_pelanggan','item', 'itemget', 'total'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_quotation)
    {
        $user_id = auth::id();
        $data = $request->all();
        Quotation::where('id_quotation','=',$id_quotation)->where('status','=','aktif')->update([
            'user_id'=>$user_id,
            'nomor_surat' => $request->nomor_surat,
            'id_pelanggan' => $request->name,
            'user_id' => $user_id,
            'tgl_quotation' => $request->dikirim,
            'tgl_jatuh_tempo' => $request->tempo,
            'perihal' => $request->perihal,
            'jumlah_pembayaran' => $request->subtotal,
            'keterangan' => $request->catatan,
        ]);
        // $id_quotation = DB::getPdo()->lastInsertId();

        if (count($data['np'] > 0)) {
            # code...
            item::where('id_quotation','=',$id_quotation)->delete($data['np']);
            foreach ($data['np'] as $key => $value) {
                # code...
                $data2 = array(
                    'id_quotation' => $id_quotation,
                    'nama_project' => $data['np'][$key],
                    'biaya_project' => $data['cp'][$key],
                );
                item::create($data2);
            }
        }
        return redirect('quotation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_quotation)
    {   
        Quotation::where('id_quotation','=', $id_quotation)->delete();
        item::where('id_quotation','=',$id_quotation)->delete();
        return redirect()->back();
    }

    public function cetak_pdf($id_quotation){
        $user_id = Auth::id();
        $data =  Quotation::with('item','pelanggan')->where('id_quotation', $id_quotation)->first();
        $pelanggan = DaftarPelanggan::where('idx_pelanggan','=', $data->id_pelanggan)->first();
        $pdf = PDF::loadview('dashboard.tipe-surat.QuotationLetter.print',compact('data','pelanggan'))->setPaper('A4','potrait');
        return $pdf->stream();  
        return view('dashboard.tipe-surat.QuotationLetter.print',compact('data','pelanggan','rp'));
    }
    

  
    public function getAutocompleteData(Request $request){
        if($request->has('term')){
            return DaftarPelanggan::where('pelanggan_nama','like','%'.$request->input('term').'%')->get();
        }
    }
    public function jquerycreate($id_quotation)
    {
        $daftar_pelanggan = DaftarPelanggan::where('idx_pelanggan','=', $id_quotation)->first();
        return $daftar_pelanggan;
    }
    public function jqueryedit($id_quotation)
    {
        $daftar_pelanggan = DaftarPelanggan::where('idx_pelanggan','=', $id_quotation)->first();
        return $daftar_pelanggan;
    }

}
