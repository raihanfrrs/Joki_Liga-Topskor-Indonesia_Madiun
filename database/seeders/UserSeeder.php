<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'username' => 'arza123',
                'password' => bcrypt('test123'),
                'level' => 'admin'
            ],
            [
                'username' => 'shofi123',
                'password' => bcrypt('test123'),
                'level' => 'user'
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
