<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
    {
        $email      = $request->email;
        $password   = md5($request->password);
        $check      = DB::table('users')->where('email', $email)->get();
        if(count($check) > 0) {
            if($check[0]->password == $password) {
                $res = array(
                    'token' => env('KEY_AUTHORIZATION'),
                    'data'  => $check[0]
                );
                return response()->json(self::res(200, 'Login successfully!', $res), 200);
            }
            return response()->json(self::res(400, 'Login unsuccessfully because password is wrong!', []), 400);
        }
        return response()->json(self::res(400, 'Login unsuccessfully because email is not already exist!', []), 400);
    }
}
