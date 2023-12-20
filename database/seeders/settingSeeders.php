<?php

namespace Database\Seeders;

use App\Models\SettingModels;
use Illuminate\Database\Seeder;

class settingSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            [
                'id'             => 1,
                'check_in' => date('H:i'),
                'check_out'     =>  date('H:i'),
            ]
        ];

        SettingModels::insert($setting);

    }
}
