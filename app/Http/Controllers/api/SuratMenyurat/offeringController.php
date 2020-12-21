<?php

namespace App\Http\Controllers\api\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\OfferingLetterRepository;
class offeringController extends ApiController
{
    protected $offering;

    public function __construct(OfferingLetterRepository $offering)
    {
        $this->offering = $offering;
    }
    public function listoffering()
    {
        $user_id = Auth::id();
        $list_offering = $this->offering->listAlloffering($user_id);
        if (collect($list_offering)->count()  > 0) {
            return $this->sendResponse(0, 19, $list_offering);
        } elseif ($list_offering->count() == 0) {
            return $this->sendResponse(0, 'Data kosong');
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function create()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    public function cetak_pdf()
    {
    }
}
