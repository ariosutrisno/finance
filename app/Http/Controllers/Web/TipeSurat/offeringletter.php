<?php

namespace App\Http\Controllers\Web\TipeSurat;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Dashboard\SuratMenyurat\Offering;
use App\Dashboard\SuratMenyurat\DaftarPelanggan;
use Illuminate\Support\Facades\Auth;
use PDF;

class offeringletter extends Controller
{
    public function index(){

        $user_id = auth::id();
        $data = Offering::where('user_id','=',$user_id)->where('status','=','aktif')->get();
        
        return view('dashboard.tipe-surat.OfferingLetter.index',compact('user_id','data'));

    }
    public function create(){

        $user_id = auth::id();
        $data = Offering::where('user_id','=',$user_id)->where('status','=','aktif')->first();
        /**
         * SUGESSTION SEARCH
         */
        $bulan_romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $letter = 'MAGANG';
        $Awal = 'ALAN-MI';
        $noUrutAkhir = Offering::max('nomor_surat');
        $nomor_surat = sprintf("%03s", abs($noUrutAkhir) + 1) . '/' . $Awal . '/' . $bulan_romawi[date('m')] . '/' . date('Y');
        if ($noUrutAkhir) {
            $nomor_surat;
        }
        return view('dashboard.tipe-surat.OfferingLetter.create',compact('user_id', 'nomor_surat'));
    }

    public function storeoffering(Request $request){
        // dd($request->all());
        $user_id = auth::id();
        Offering::insert([
            'user_id' => $user_id,
            'letter_nama' => $request->name,
            'nomor_surat' => $request->nosurat,
            'letter_email' => $request->email,
            'letter_telepon' => $request->telepon,
            'letter_alamat' => $request->address,
            'letter_peruntukan'=>$request->selectFungsi,
            'letter_tanggal_lamar' => $request->tgl_lamar,
            'letter_tanggal_mulai' => $request->tgl_mulai,
            'letter_tanggal_selesai' => $request->tgl_selesai,
            'letter_jam_mulai' => $request->jam_mulai_kerja,
            'letter_jam_selesai' => $request->jam_selesai_kerja,
            'letter_narahubung' => $request->narahubung,
            'letter_telepon_pembimbing' => $request->telepon_pembimbing,
        ]);
        return redirect('offering');
    }

    public function cetak_pdf($idx_offering_letter)
    {
        $user_id = auth::id();
        $data = Offering::find($idx_offering_letter);
    	$pdf = PDF::loadview('dashboard.tipe-surat.OfferingLetter.print',compact('data'))->setPaper('A4','potrait');
        return $pdf->stream();
        return view('dashboard.tipe-surat.OfferingLetter.print',compact('data','user_id'));
    }
    public function edit($idx_offering_letter){
        $user_id = auth::id();
        $data = Offering::find($idx_offering_letter);
        $bulan_romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $letter = 'MAGANG';
        $Awal = 'ALAN-MI';
        $no = 1;
        $noUrutAkhir = Offering::where('status', '=', 'aktif')->where('user_id', '=', $user_id)->orderBy('nomor_surat', 'desc')->get();
        $nomor_surat = sprintf("%03s", abs($noUrutAkhir)) . '/' . $letter .  '/' . $Awal . '/' . $bulan_romawi[date('m')] . '/' . date('Y');
        if ($noUrutAkhir) {
            $nomor_surat;
        }
        return view('dashboard.tipe-surat.OfferingLetter.edit', compact('data','user_id','nomor_surat'));
    }
    public function updateffering(Request $request){
        $user_id = auth::id();
        Offering::where('idx_offering_letter',$request->idx_offering_letter)->update([
            'user_id' => $user_id,
            'nomor_surat' => $request->nosurat,
            'letter_nama' => $request->name,
            'letter_email' => $request->email,
            'letter_telepon' => $request->telepon,
            'letter_alamat' => $request->address,
            'letter_tanggal_lamar' => $request->tgl_lamar,
            'letter_tanggal_mulai' => $request->tgl_mulai,
            'letter_tanggal_selesai' => $request->tgl_selesai,
            'letter_jam_mulai' => $request->jam_mulai_kerja,
            'letter_jam_selesai' => $request->jam_selesai_kerja,
            'letter_narahubung' => $request->narahubung,
            'letter_telepon_pembimbing' => $request->telepon_pembimbing,
        ]);
        return redirect('offering');
    }
    public function destroyoffering($idx_offering_letter){
        Offering::where('idx_offering_letter', '=', $idx_offering_letter)->update(['status' => 'non-aktif']);
        return redirect()->back();
    }
    
}
