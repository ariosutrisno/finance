<?php

namespace App\Http\Controllers\api\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\QuotationLetterRepository;
class quotationController extends ApiController
{
    protected $quotation;

    public function __construct(QuotationLetterRepository $quotation)
    {
        $this->quotation = $quotation;
    }
    public function index()
    {
        $user_id = Auth::id();
        $list_quotation = $this->quotation->listQuotation($user_id);
        if (collect($list_quotation)->count()  > 0) {
            return $this->sendResponse(0, 19, $list_quotation);
        } elseif ($list_quotation->count() == 0) {
            return $this->sendResponse(0, 'Data kosong');
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function create(Request $request)
    {
        
        $user_id = Auth::id();
        $thisdata = [
            'perihal' => $request->perihal,
            'nomor_surat' => $request->nomor_surat,
            'id_pelanggan' => $request->id_pelanggan,
            'tgl_quotation' => $request->tgl_quotation,
            'tgl_jatuh_tempo' => $request->tgl_jatuh_tempo,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'keterangan' => $request->keterangan,
        ];
        unset($thisdata['created_at']);
        unset($thisdata['updated_at']);
        $createPelanggan = $this->quotation->createQuotation($request,$user_id, $thisdata);
        if (collect($createPelanggan)) {
            return $this->sendResponse(0, 19, $thisdata);
        } else {
            return $this->sendError(2, 'Error');
        }
    }
    public function updatequotation()
    {

    }
    public function delete()
    {

    }
    public function cetak_pdf()
    {

    }
    public function nomor_surat()
    {
        $no_surat = $this->quotation->nomor_surat();
        return $no_surat;
        
    }
}
