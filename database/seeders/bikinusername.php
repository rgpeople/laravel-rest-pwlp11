<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bikinusername extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'=>'faiz',
            'name'=>'Faiz Atha Radhitya',
            'email'=>'faiz.polinema@faiz.com',
            'password'=> Hash::make('faiz')
        ]);
    }
}
