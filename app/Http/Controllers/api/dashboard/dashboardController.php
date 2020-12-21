<?php

namespace App\Http\Controllers\api\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Repositories\DashboardRepository;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class dashboardController extends ApiController
{
    protected $dashboard;

    public function __construct(DashboardRepository $dashboard)
    {
        $this->dashboard = $dashboard;
    }
    public function getdashboard(Request $request)
    {
        $user_id = Auth::id();  
        $getdashboard = $this->dashboard->getallbukukas($request,$user_id);
        if (collect($getdashboard)) {
            return $this->sendResponse(0, 19, $getdashboard);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }
    public function detailkas($idx_buku_kas)
    {
        $user_id = Auth::id();
        $getdashboard = $this->dashboard->getallbukukas($idx_buku_kas,$user_id);
        if (collect($getdashboard)) {
            return $this->sendResponse(0, 19, $getdashboard);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }

}
