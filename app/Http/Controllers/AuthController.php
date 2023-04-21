<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
   public function login(Request $request){

//email check
$user = User::where('id',$request->id)->first();

    if ($user) {
        # code...
        if(Hash::check($request->password,$user->password)){
            return
             response()->json([
                'user' => $user ,
                'token' => $user->createToken(time())->plainTextToken
            ]);
        } else {
                return
                response()->json([
                    'user' => null,
                    'token' => null
                ]);
        }
    } else {
        return
            response()->json([
                'user' => null,
                'token' => null
            ]);
    }
    }
}
