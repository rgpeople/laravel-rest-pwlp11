<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route Baru yang di tambahkan
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/mahasiswa',MahasiswaController::class);
    Route::get('/logout',[ApiAuthController::class,'logout']);
});

//Route hello world baru di dalam api.php dengan bentuk json
// Route::get('/hello',function(){
//     $data=["message"=>"hello world"];
//     return response()->json($data);
// });

//Route hello world dengan bentuk teks
Route::get('/hello',function(){
    return "hello world";
});
// // Route tambahan untuk mahasiswa
// Route::apiResource('/mahasiswa',MahasiswaController::class);

// Route login di api.php
Route::post('/login',[ApiAuthController::class,'login']);

// Route regsiter di api.php
Route::post('/register',[ApiAuthController::class,'register']);
