<?php

namespace Database\Seeders;

use App\Models\LemburModels;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermohonanLemburSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permohonan = [
            [
                'id'             => 1,
                'user_id' => 2,
                'awal_lembur' => Carbon::create(2024, 1, 16),
                'akhir_lembur' => Carbon::create(2024, 1, 18),
                'jumlah_lembur' => 2,
                'description' => 'Saya ingin mengajukan lembur 2 hari kedepan untuk project yang sekarang saya kerjakan bersama tim.',
                'status' => 'pending',
                'created_at'     =>  date('Y-m-d H:i:s'),

            ]
        ];

        LemburModels::insert($permohonan);
    }
}
