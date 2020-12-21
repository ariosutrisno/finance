<?php

namespace App\Http\Controllers\api\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\InvoiceRepository;

class invoiceController extends ApiController
{
    protected $invoice;

    public function __construct(InvoiceRepository $invoice)
    {
        $this->invoice = $invoice;
    }
    public function getAllinvoice()
    {
        $user_id = Auth::id();
        $allinvoice = $this->invoice->index($user_id);
        if (collect($allinvoice)->count()  > 0) {
            return $this->sendResponse(0, 19, $allinvoice);
        } elseif ($allinvoice->count() == 0) {
            return $this->sendResponse(0, 'Data kosong');
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function create()
    {
        
    }
    public function updateinvoice()
    {
    }
    public function delete()
    {
    }
    public function cetak_pdf()
    {
    }
}
