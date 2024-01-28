<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'role_id' => 1,
                'jabatan_id' => 1,
                'name'           => 'Administrator',
                'nip'          => '11223344',
                'email'          => 'admin@admin.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'image'          => 'https://via.placeholder.com/500',
                'status' => true,
                'password'       => bcrypt('password123'),
                'created_at'     =>  date('Y-m-d H:i:s'),
                'updated_at'     => null,
                'deleted_at'     => null,
            ],
            [
                'id'             => 2,
                'role_id' => 2,
                'jabatan_id' => 2,
                'name'           => 'Fajar Fakhrian',
                'nip'          => '11223355',
                'email'          => 'fajar@fakhriyan.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'image'          => 'https://via.placeholder.com/500',
                'status' => true,
                'password'       => bcrypt('password'),
                'created_at'     =>  date('Y-m-d H:i:s'),
                'updated_at'     => null,
                'deleted_at'     => null,
            ],
            [
                'id'             => 3,
                'role_id' => 3,
                'jabatan_id' => 1,
                'name'           => 'Arjun',
                'nip'          => '00000000',
                'email'          => 'owner@owner.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'image'          => 'https://via.placeholder.com/500',
                'status' => true,
                'password'       => bcrypt('password123'),
                'created_at'     =>  date('Y-m-d H:i:s'),
                'updated_at'     => null,
                'deleted_at'     => null,
            ]
        ];

        User::insert($users);
    }
}
