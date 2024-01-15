<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JabatanModels;

class JabatanSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            [
                'id'             => 1,
                'jabatan' => 'founder',
                'created_at'     =>  date('Y-m-d H:i:s'),
            ],
            [
                'id'             => 2,
                'jabatan' => 'pegawai',
                'created_at'     =>  date('Y-m-d H:i:s'),
            ],
            [
                'id'             => 3,
                'jabatan' => 'hrd',
                'created_at'     =>  date('Y-m-d H:i:s'),
            ]
        ];

        JabatanModels::insert($jabatan);
    }
}
