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
                'jabatan' => 'ceo',
                'created_at'     =>  date('Y-m-d H:i:s'),
            ]
        ];

        JabatanModels::insert($jabatan);
    }
}
