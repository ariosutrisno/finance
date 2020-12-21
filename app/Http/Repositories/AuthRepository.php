<?php

namespace App\Http\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;
use phpDocumentor\Reflection\Types\Null_;

class AuthRepository
{
    public function insertRegister($request){
        $register = new User([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>$request->password,
            'password_confirmation' =>$request->password_confirmation,
        ]);
        return $register->save();
    }

    public function validateRegister($request){
        $validator  = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:10',
            'password_confirmation' => 'required_with:password|same:password|min:10',
        ]);
        return $validator;
    }



    public function getExpiredToken($tokenId)
    {
        if (empty($tokenId)) {
            return false;
        }

        $users = DB::table('oauth_access_tokens')
        ->where('id', $tokenId)
            ->first();

        $expires = $users->expires_at;

        if ($expires >= date('Y-m-d H:i:s')) {

            return true;
        }
        return false;
    }

    public function deletetoken($tokenId)
    {
        DB::table('users')
        ->where('api_token', '=', $tokenId)
        -> update(['api_token' => '']);
        return false;
    }
    

}
