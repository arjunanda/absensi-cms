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
                'password'       => bcrypt('babayo12345'),
                'created_at'     =>  date('Y-m-d H:i:s'),
                'updated_at'     => null,
                'deleted_at'     => null,
            ]
        ];

        User::insert($users);
    }
}
