<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dosens = [
            [
                'name' => 'Arza Arrahman',
                'slug' => 'arza-arrahman',
                'email' => 'arzaarrahman123@gmail.com',
                'phone' => '08123484832',
                'user_id' => '1',
                'status' => 'active'
            ]
        ];

        foreach ($dosens as $key => $value) {
            Admin::create($value);
        }
    }
}
