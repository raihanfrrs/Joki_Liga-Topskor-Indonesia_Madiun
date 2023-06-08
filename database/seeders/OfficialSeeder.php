<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $officials = [
            [
                'club_id' => 1,
                'name' => 'Hj. Sulaiman Djoko Dahlan S.Si',
                'slug' => 'hj-sulaiman-djoko-dahlan-s-si',
                'position' => 'Club Manager',
                'licence' => 'A',
                'social_media' => 'https://www.instagram.com/pssi',
                'birthPlace' => 'Magelang',
                'birthDate' => '1976-05-02',
                'phone' => '08172647212',
                'email' => 'sulaimandjokodahlan76@gmail.com',
                'status' => 'terima'
            ],
            [
                'club_id' => 2,
                'name' => 'Ir. Solikin Nurman Abdi S.Ki',
                'slug' => 'ir-solikin-nurman-abdi-s-ki',
                'position' => 'Club Manager',
                'licence' => 'A',
                'social_media' => 'https://www.instagram.com/pssi',
                'birthPlace' => 'Mojokerto',
                'birthDate' => '1987-12-18',
                'phone' => '08237474832',
                'email' => 'solikinnurmanabdi76@gmail.com',
                'status' => 'terima'
            ]
        ];

        foreach ($officials as $key => $value) {
            Official::create($value);
        }
    }
}
