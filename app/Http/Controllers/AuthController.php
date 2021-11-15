<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Lib\Abilities;

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

    public function login(Abilities $abilities, Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad email/password combination'
            ], 401);
        }
        $permissions = $abilities->getAbilities($user->role);
        $token = $user->createToken('test-app-token', $permissions)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth('sanctum')->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }}
