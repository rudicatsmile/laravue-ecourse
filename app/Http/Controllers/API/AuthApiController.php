<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        //validate input
        $request->validate([
            'name'      => ['required','string','max:100'],
            'email'     => ['required','string','email','max:50','unique:users'],
            'password'  => ['required','min:6']
        ]);

        //create user
        $user = User::create([
            'name'      =>  $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)

        ]);

        //create token

        $token = $user->createToken('authToken')->plainTextToken;

        $data = [
            'access_token'   =>  $token,
            'token_type'     =>  'Bearer',
            'user'           =>  $user

        ];
        //create json
        return response()->json([
			'status' 	=> true,
			'data' 		=> $data,
			'message' 	=> 'Register Success'
		]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'email|required',
            'password'  => 'required'
        ]);

        $credentials = request(['email','password']);

        if(!auth()->attempt($credentials)){
            return response()->json(['message'=>'Unauthorized'], 401);
        }

        //login dulu

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('authToken')->plainTextToken;

        $data = [
            'access_token'   =>  $token,
            'token_type'     =>  'Bearer',
            'user'           =>  $user

        ];

        return response()->json([
			'status' 	=> true,
			'data' 		=> $data,
			'message' 	=> 'Login Success'
		]);
    }
}
