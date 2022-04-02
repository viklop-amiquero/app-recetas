<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'kelly',
            'email' => 'kelly@gmail.com',
            'password' => Hash::make('gratificante'),
            'url' =>  'https://kellypsicologa.com',
        ]);

        $user = User::create([
            'name' => 'daniela',
            'email' => 'daniela@gmail.com',
            'password' => Hash::make('gratificante'),
            'url' =>  'https://danielacontadora.com',
        ]);
    }
}
