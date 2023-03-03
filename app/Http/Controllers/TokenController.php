<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TokenController extends Controller
{
//    public function create($username)
//   {
//       $token['username_access_key']=$username;
//       $token['token_body']=Str::random(32);
//       Token::create($token);
//       return $token['token_body'];
//    }
    public function getallToken()
    {
       $tokens=Token::all();
       return response($tokens,200);
    }
    public function getToken($user_access_key)
    {
        $tokens=Token::select('*')->where('user_access_key',$user_access_key)->get();

        return response($tokens,200);
    }
    public function create(Request $request){

       // $user_access_key=User::select('*')->where('user_access_key',$request['user_access_key'])->get();
        if(User::where('user_access_key', $request['user_access_key'])->exists()) {
            $request['token_body']=Str::random(30);
        $tokenFields = $request->validate([
            'user_access_key' => 'required',
            'token_body'=>['required',Rule::unique('tokens', 'token_body')],
            'email'=>['required','email']
        ]);
       Token::create($tokenFields);
        return response(json_encode($tokenFields),200);

        }

        return response("Key is invalid");
    }
}
