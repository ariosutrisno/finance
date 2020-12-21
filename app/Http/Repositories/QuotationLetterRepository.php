<?php

namespace App\Http\Repositories;

use App\Dashboard\SuratMenyurat\item;
use App\Dashboard\SuratMenyurat\Quotation;
use App\Dashboard\SuratMenyurat\DaftarPelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class QuotationLetterRepository
{
    var $delete_data;
    public function listQuotation($user_id)
    {
        $list = Quotation::where('user_id','=', $user_id)->orderBy('created_at','desc')
        ->select('id_quotation','nomor_surat','perihal','user_id','id_pelanggan','tgl_quotation','tgl_jatuh_tempo','jumlah_pembayaran','keterangan')
        ->get();
        return $list;
    }
    public function createQuotation($request,$user_id,$thisdata)
    {
        $data = $request->all();

        Quotation::insert([
            'nomor_surat' => $thisdata['nomor_surat'],
            'id_pelanggan' => $thisdata['id_pelanggan'],
            'user_id' => $user_id,
            'tgl_quotation' => $thisdata['tgl_quotation'],
            'tgl_jatuh_tempo' => $thisdata['tgl_jatuh_tempo'],
            'perihal' => $thisdata['perihal'],
            'jumlah_pembayaran' => $thisdata['jumlah_pembayaran'],
            'keterangan' => $thisdata['keterangan'],
        ]);
        $id_quotation = DB::getPdo()->lastInsertId();

        for ($i=0; $i < $data['project']; $i++) {
            # code...
            $data2 = array(
                'id_quotation' => $id_quotation,
                'nama_project' => $data['nama_project'][$i],
                'biaya_project' => $data['biaya_projec'][$i],
            );
            item::create($data2);
        }
    }
    public function updatequotation($request,$id_quotation,$user_id)
    {
        $data = $request->all();
        Quotation::where('id_quotation', '=', $id_quotation)->where('status', '=', 'aktif')->update([
            'user_id' => $user_id,
            'nomor_surat' => $request->nomor_surat,
            'id_pelanggan' => $request->name,
            'user_id' => $user_id,
            'tgl_quotation' => $request->dikirim,
            'tgl_jatuh_tempo' => $request->tempo,
            'perihal' => $request->perihal,
            'jumlah_pembayaran' => $request->subtotal,
            'keterangan' => $request->catatan,
        ]);
        if (count($data['item_project'] > 0)) {
            # code...
            item::where('id_quotation', '=', $id_quotation)->delete($data['item_project']);
            foreach ($data['item_project'] as $key => $value) {
                # code...
                $data2 = array(
                    'id_quotation' => $id_quotation,
                    'nama_project' => $data['item_project'][$key],
                    'biaya_project' => $data['cp'][$key],
                );
                item::create($data2);
            }
        }
    }
    public function deletequotation($id_quotation)
    {
        $delete_data = new QuotationLetterRepository();
        $delete_data->quotation = Quotation::where('id_quotation','=',$id_quotation)->delete();
        $delete_data->quotation_item = item::where('id_quotation','=',$id_quotation)->delete();
        return $delete_data;
    }
    public function printquotation($id_quotation,$user_id)
    {
        $data =  Quotation::with('item', 'pelanggan')->where('id_quotation', $id_quotation)->first();
        $pelanggan = DaftarPelanggan::where('idx_pelanggan', '=', $data->id_pelanggan)->first();
        $pdf = PDF::loadview('dashboard.tipe-surat.QuotationLetter.print', compact('data', 'pelanggan'))->setPaper('A4', 'potrait');
        return $pdf->stream();  
    }
    
    public function nomor_surat()
    {
        $bulan_romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $Awal = 'ALAN-D';
        $noUrutAkhir = Quotation::max('nomor_surat');
        $nomor_surat = sprintf("%03s", abs($noUrutAkhir) + 1) . '/' . $Awal . '/' . $bulan_romawi[date('m')] . '/' . date('Y');
        if ($noUrutAkhir) {
            $nomor_surat;
        }
        return $nomor_surat;
    }
}
