<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request) {
        $user = new User;
        $user->name = $request['name'];
        $user->email =$request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        //create token
        $token = $user->createToken('test-app-token')->plainTextToken;
        $response = [
            'status'=>true,
            'message'=>'registered successfully!',
            'data' =>[
                'user'=>$user,
                'token'=>$token
            ]
        ];
        return response($response,201);
    }

    public function login() {

    }
}
