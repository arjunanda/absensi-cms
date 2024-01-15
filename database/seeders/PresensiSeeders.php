<?php

namespace Database\Seeders;

use App\Models\AbsensiModels;
use Illuminate\Database\Seeder;

class PresensiSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\AbsensiModels::truncate();
        \App\Models\AbsensiModels::factory()->count(100)->create();
    }
}
