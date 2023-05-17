<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequests;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //di ganti dari all() -> paginate() supaya membuat pagination
        return MahasiswaResource::collection(Mahasiswa::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequests $request)
    {
        // return response()->json('hello');

        // Update Terbaru
        return new MahasiswaResource(Mahasiswa::create(
            [
                'Nim'=>$request->Nim,
                'Nama'=>$request->Nama,
                'Jurusan'=>$request->Jurusan,
                'No_Handphone'=>$request->No_Handphone,
                'kelas_id'=>$request->kelas_id,
                'Foto'=>$request->Foto,
            ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaResource($mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
