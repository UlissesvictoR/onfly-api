<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|string|unique:users,email|confirmed',
        ]);

        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request){

        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|string',
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            $token = $user->createToken('token')->plainTextToken;
            $response = [
                'user'  => $user,
                'token' => $token
            ];

            return response($response, 201);
        }else{
            return response('Erro ao tentar logar!', 401);
        }

    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return('Deslogado do sistema.');
    }

}
