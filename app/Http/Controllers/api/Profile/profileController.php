<?php

namespace App\Http\Controllers\api\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\ProfileRepository;
class profileController extends ApiController
{
    protected $profile;

    public function __construct(ProfileRepository $profile)
    {
        $this->profile = $profile;
    }
    public function profileedit()
    {

    }
}
