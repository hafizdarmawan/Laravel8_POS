<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting'        => 1,
            'nama_perusahaan'   => 'Toko Hafizd',
            'alamat'            => 'Rt02, Rw03 Tremas, Arjosari, Pacitan',
            'telepon'           => '087758373050',
            'tipe_nota'         => 1, //kecil
            'diskon'            => 5,
            'path_logo'         => '/img/logo.png',
            'path_kartu_member' => '/img/member.png'
        ]);
    }
}
