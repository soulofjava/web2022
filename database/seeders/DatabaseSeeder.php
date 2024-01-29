<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            'web_name' => 'PesonaFM',
            'web_description' => '92.1 FM Radio Pesona Stasiun Terbaikmu',
            'email' => 'superadmin@app.com',
            'address' => 'Jl. Soekarno - Hatta No.12A, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311',
            'phone' => '(0286)',
            'instagram' => '#',
            'twitter' => '#',
            'facebook' => '#',
            'youtube' => '#',
            'url_stream' => '#',
            'themes_front' => 'FlexStart',
            'themes_back' => 'back.a',
        ]);

        $user = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@app.com',
                'password' => bcrypt('@P4ssw0rd'),
                'role_id' => 1
            ],
            [
                'name' => 'admin',
                'email' => 'pesona@app.com',
                'password' => bcrypt('@P4ssw0rd'),
                'role_id' => 2
            ]
        ];

        foreach ($user as $datum) {
            User::create($datum);
        }
    }
}
