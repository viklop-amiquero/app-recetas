<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsuarioSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'kelly',
            'email' => 'kelly@gmail.com',
            'password' => Hash::make('gratificante'),
            'url' =>  'https://kellypsicologa.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'viktor',
            'email' => 'viktor@gmail.com',
            'password' => Hash::make('gratificante'),
            'url' =>  'https://viktordeveloper.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'daniela',
            'email' => 'daniela@gmail.com',
            'password' => Hash::make('gratificante'),
            'url' =>  'https://danielacontadora.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'lucero',
            'email' => 'lucero@gmail.com',
            'password' => Hash::make('gratificante'),
            'url' =>  'https://lucerocosturera.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
