<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleModels;

class RoleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'             => 1,
                'role' => 'admin',
                'created_at'     =>  date('Y-m-d H:i:s'),
            ]
        ];

        RoleModels::insert($roles);
    }
}
