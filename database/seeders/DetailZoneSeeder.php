<?php

namespace Database\Seeders;

use App\Models\DetailZone;
use Illuminate\Database\Seeder;

class DetailZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detailzones = [
            [
                'zone_id' => 1,
                'age_group_id' => 1
            ],
            [
                'zone_id' => 1,
                'age_group_id' => 2
            ],
            [
                'zone_id' => 1,
                'age_group_id' => 3
            ],
            [
                'zone_id' => 2,
                'age_group_id' => 2
            ],
            [
                'zone_id' => 2,
                'age_group_id' => 3
            ],
            [
                'zone_id' => 3,
                'age_group_id' => 1
            ],
        ];

        foreach ($detailzones as $key => $value) {
            DetailZone::create($value);
        }
    }
}
