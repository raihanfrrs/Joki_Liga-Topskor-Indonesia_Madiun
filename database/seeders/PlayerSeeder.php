<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = [
            [
                'club_id' => 1,
                'zone_id' => 1,
                'age_group_id' => 1,
                'name' => 'Angga Putra Laksono',
                'slug' => 'angga-putra-laksono',
                'birthPlace' => 'Surabaya', 
                'birthDate' => '2000-01-20',
                'nik' => '2700605146786176',
                'nisn' => '20013239223',
                'phone' => '0817646483',
                'address' => 'Jl. Kapasari No.4, Kapasari, Kec. Genteng, Surabaya, Jawa Timur 60273',
                'position' => 'Striker'
            ],
            [
                'club_id' => 2,
                'zone_id' => 2,
                'age_group_id' => 2,
                'name' => 'Fitroni Haikal Firmansyah',
                'slug' => 'fitroni-haikal-firmansyah',
                'birthPlace' => 'Malang', 
                'birthDate' => '2000-07-17',
                'nik' => '3181428606544271',
                'nisn' => '200123231',
                'phone' => '0817233443',
                'address' => 'Jl. Pandan No.5, Ketabang, Kec. Genteng, Surabaya, Jawa Timur 60272',
                'position' => 'Goalkeeper'
            ]
        ];

        foreach ($players as $key => $value) {
            Player::create($value);
        }
    }
}
