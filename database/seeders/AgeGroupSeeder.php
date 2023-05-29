<?php

namespace Database\Seeders;

use App\Models\AgeGroup;
use Illuminate\Database\Seeder;

class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ages = [
            [
                'age' => 'U-13'
            ],
            [
                'age' => 'U-16'
            ],
            [
                'age' => 'U-19'
            ]
        ];

        foreach ($ages as $key => $value) {
            AgeGroup::create($value);
        }
    }
}
