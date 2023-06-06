<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        // Validasi / cek apakah data user yang di input ada di dalam database
        $user = User::where('username',$request->username)->first();

        // validasi / cek password yang di input ada di database apakah ada
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'user atau password salah'
            ],401);
        }

        // Generate token jikalau semua validasi sudah valid
        $token = $user->createToken('token')->plainTextToken;

        // return response()->json([
        //     'message'=>'success login',
        //     'user'=>$user,
        //     'token'=>$token,
        // ],200);
        
        // Metode login baru dengan return LoginRequest
        return new LoginResource([
            'message'=>'succes login',
            'user'=>$user,
            'token'=>$token,
        ],200);
    }

    public function logout(Request $request)
    {
        #hapus token supaya logout
        $request->user()->tokens()->delete();

        #response
        return response()->noContent();
    }

    public function register(RegisterRequest $request)
    {
        $user=User::create([
            'username'=>$request->username,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $token=$user->createToken('token')->plainTextToken;

        return new LoginResource([
            'message'=>'succes login',
            'user'=>$user,
            'token'=>$token,
        ],200);
    }
}
