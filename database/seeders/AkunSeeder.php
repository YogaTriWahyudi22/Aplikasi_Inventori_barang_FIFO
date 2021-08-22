<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'status' => 'admin'
        ]);

        DB::table('alamat')->insert([
            'username' => 'admin',
            'nohp' => '08123456',
            'alamat' => 'Kota Padang'
        ]);
    }
}
