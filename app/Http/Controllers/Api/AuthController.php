<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();
       
      
        // dd($userInfo);
        if (!$userInfo) {
            // return back()->with('fail', 'We do not recognize your email address');
            return response()->json(['fail' => false, 'message' => 'We do not recognize your email address'], 200);
        } else {
            //check password
            if (Hash::check($request->password, $userInfo->password)) {
                // dd($userInfo);
                Auth::guard('web')->login($userInfo, true);
                return response()->json(['success' => true, 'message' => 'Login successfully'], 200);
            } else {
                // return back()->with('fail', 'Incorrect password');
                return response()->json(['fail' => true, 'message' => 'Incorrect password'], 200);
            }
        }
    }
}


//     public function getUserDetail()
//     {
//         if (Auth::guard('web')->check()) {
//             $user = Auth::guard('web')->user();
//             return response(['data' => $user], 200);
//         }
//         return response(['data' => 'Unauthorized'], 401);
//     }


