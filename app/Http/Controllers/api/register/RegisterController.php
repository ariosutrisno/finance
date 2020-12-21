<?php

namespace App\Http\Controllers\api\register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;
use App\Http\Repositories\AuthRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
class RegisterController extends ApiController
{
    protected $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function registerAsUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'email' =>'required|email|string|unique:users',
            'password'=>'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
        ]);
        if ($validator->fails()) {
            $validate = ($validator->errors());
            return $this->sendError(1, 1, $validate);
        }
        $thisdata = [
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
        ];
        $inserdata = User::create($thisdata);
        $success['token'] =  $inserdata->createToken('email')->accessToken;
        $success['name'] =  $inserdata->name;
        if ($inserdata == true) {
            # code...
            return $this->sendResponse(0, "Berhasil Registrasi",$success);
        } else {
            # code...
            return $this->sendError(2, "Gagal Registrasi", (object) array());
        }
    }
}
