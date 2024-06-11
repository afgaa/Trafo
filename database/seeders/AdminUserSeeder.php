<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Trafo',
            'email' => 'adminTrafo@gmail.com',
            'password' => Hash::make('admintrafo123'), 
            'role' => 1, // Angka 1 untuk peran admin
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
