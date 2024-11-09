<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $credentails = Auth::user();
        $customClaims = ['exp' => now()->addMinutes(1)->timestamp];
        if(!$token = JWTAuth::claims($customClaims)->fromUser($credentails)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        return response()->json(['token' => $token], 200);

    }
}
