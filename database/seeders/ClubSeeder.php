<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubs = [
            [
                'name' => 'Kanigara Football Club',
                'slug' => 'kanigara-football-club',
                'address' => 'Jl. Kelud No.125, Kepanjen Lor, Kec. Kepanjenkidul, Kota Blitar, Jawa Timur 66117',
                'phone' => '0812343223342',
                'social_media' => 'https://www.instagram.com/pssi',
                'club_manager' => 'Hj. Sulaiman Djoko Dahlan S.Si',
                'status' => 'active',
                'zone_id' => 1,
                'user_id' => 2
            ],
            [
                'name' => 'Cengelan Babakan Club',
                'slug' => 'cengelan-babakan-club',
                'address' => 'Jl. Raya Ketengan No.45, Junok, Tunjung, Kec. Burneh, Kabupaten Bangkalan, Jawa Timur 69121',
                'phone' => '082735463721',
                'social_media' => 'https://www.instagram.com/pssi',
                'club_manager' => 'Ir. Solikin Nurman Abdi S.Ki',
                'status' => 'active',
                'zone_id' => 2,
                'user_id' => 3
            ]
        ];

        foreach ($clubs as $key => $value) {
            Club::create($value);
        }
    }
}
