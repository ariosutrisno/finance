<?php

namespace App\Http\Controllers\api\hutang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ApiController;
use App\Http\Repositories\HutangRepository;
use Illuminate\Support\Facades\Auth;

class HutangController extends ApiController
{
    protected $hutang;

    public function __construct(HutangRepository $hutang )
    {
        $this->hutang = $hutang;
    }
    public function allhutangpiutang()
    {
        $user_id = Auth::id();
        $gethutangpiutang = $this->hutang->listhutangpiutang($user_id);
        if (collect($gethutangpiutang)->count()) {
            return $this->sendResponse(0, 19, $gethutangpiutang);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }

    public function createhutangpiutang(Request $request)
    {
        $user_id_hutang = Auth::id();
        $user_id_piutang = Auth::id();
        $save_data = $this->hutang->create_hutangpiutang($request,$user_id_hutang,$user_id_piutang);
        if ($save_data) {
            return $this->sendResponse(0, "Berhasil",[]);
        } else { 
            return $this->sendError(2, 'Error');
        }
        
    }
    public function destroy(Request $request,$idx_hutang)
    {
        $user_id = Auth::id();
        $save_data = $this->hutang->delete($request,$idx_hutang,$user_id);
        if ($save_data) {
            return $this->sendResponse(0, "Berhasil", $save_data);
        } else {
            return $this->sendError(2, 'Error');
        }
    }
}
