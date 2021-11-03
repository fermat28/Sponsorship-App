<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
            "nom" => "fermat",
            "prenom" => "pierre",
            "matricule" => "18G00261",
            "telephone" => 696796973,
            "sexe" => "M",
            "filiere" => "TTIC",
            "niveau" => 3,
            "email" => "aimericpouga28@gmail.com",
            'password' => Hash::make('password')
        ]);
    }
}
