<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('adminadmin'),
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'role' => 'user',
                'password' => bcrypt('useruser'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
