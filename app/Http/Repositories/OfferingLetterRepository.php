<?php

namespace App\Http\Repositories;

use App\Dashboard\SuratMenyurat\Offering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class OfferingLetterRepository
{
    public function listAlloffering($user_id)
    {
        $offering = Offering::where('user_id','=',$user_id)
        ->select('idx_offering_letter','user_id','nomor_surat','letter_nama','letter_email','letter_telepon','letter_alamat','letter_peruntukan','letter_tanggal_lamar', 'letter_tanggal_mulai', 'letter_tanggal_selesai', 'letter_jam_mulai', 'letter_jam_selesai', 'letter_narahubung', 'letter_telepon_pembimbing')
        ->get();
        return $offering;
    }

    public function createoffering($user_id,$thisdata)
    {
        $data = Offering::where('user_id', '=', $user_id)->first();
        $bulan_romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $letter = 'MAGANG';
        $Awal = 'ALAN-MI';
        $noUrutAkhir = Offering::max('nomor_surat');
        $nomor_surat = sprintf("%03s", abs($noUrutAkhir + 1)) . '/' . $letter .  '/' . $Awal . '/' . $bulan_romawi[date('m')] . '/' . date('Y');
        if ($noUrutAkhir) {
            $nomor_surat;
        }
        return $data;
    }
    public function editoffering($id_offering_letter)
    {
        $data = Offering::where('idx_offering_letter','=', $id_offering_letter)->first();
        return $data;
    }
    public function updateoffering($thisdata,$request,$user_id,$id_offering_letter)
    {
        Offering::where('idx_offering_letter','=', $id_offering_letter)->update([
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
    }
    public function destroy($idx_offering_letter)
    {
        $delete = Offering::where('idx_offering_letter','=',$idx_offering_letter)->delete();
        return $delete;
    } 
    public function ceteakPdf($idx_offering_letter,$user_id)
    {
        $data = Offering::find($idx_offering_letter);
        $pdf = PDF::loadview('dashboard.tipe-surat.OfferingLetter.print', compact('data'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    } 
}
