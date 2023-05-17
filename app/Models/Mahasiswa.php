<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table="mahasiswas"; //Eloquent akan membuat model Mahasiswa menyimpan record di table mahasiswas
    public $timestamps=false;
    public $primaryKey='Nim'; //Memanggil isi DB dengan primarykey
    public $incrementing = false;

    protected $fillable = [
        'Nim',
        'Nama',
        'Foto',
        'Jurusan',
        'No_Handphone',
        'Email',
        'TTL',
        'kelas_id',
    ];
}
