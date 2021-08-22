<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PimpinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pimpinan',
            'username' => 'pimpinan',
            'password' => Hash::make('pimpinan'),
            'status' => 'pimpinan'
        ]);

        DB::table('alamat')->insert([
            'username' => 'pimpinan',
            'nohp' => '08123456',
            'alamat' => 'Kota Padang'
        ]);
    }
}
