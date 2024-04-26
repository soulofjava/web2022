<?php

namespace Database\Seeders;

use App\Models\GuestBook;
use App\Models\RelatedLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Themes;
use App\Models\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            FrontMenuSeeder::class,
            ThemesSeeder::class,
            ComCodes::class,
            PermissionSeeder::class,
            ComponentSeeder::class,
            KategoriSeeder::class,
            // RegionSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        DB::table('websites')->insert([
            'web_name' => 'Dinas Kesehatan Kabupaten Wonosobo',
            'web_description' => 'Website Resmi Dinas Kesehatan Kabupaten Wonosobo',
            'email' => 'dinkes@wonosobokab.go.id',
            'address' => 'Jl. T.Jogonegoro 2-4, Jaraksari, Kec. Wonosobo',
            'phone' => '(0286) 321033',
            'instagram' => 'https://www.instagram.com/diskominfo_wonosobo/?hl=id',
            'twitter' => 'https://twitter.com/diskominfo_wsb',
            'facebook' => 'https://www.facebook.com/wonosobohebat/',
            'youtube' => 'https://www.youtube.com/c/OfficialWonosoboTV',
            'url_stream' => '#',
            'themes_front' => 'boxass',
            'themes_back' => 'back.a',
            'open_hours' => "Senin - Kamis (07:00 - 14:00 WIB) Jum'at (07:00 - 11:00 WIB)",
        ]);

        $related = [
            [
                'name' => 'Website Pemkab Wonosobo',
                'url' => 'https://website.wonosobokab.go.id/',
            ],
            [
                'name' => 'Dashboard Smartcity',
                'url' => 'https://smartcity.wonosobokab.go.id/',
            ],
            [
                'name' => 'Website Diskominfo Wonosobo',
                'url' => 'https://diskominnfo.wonosobokab.go.id/',
            ]
        ];

        foreach ($related as $rr) {
            RelatedLink::create($rr);
        }

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            GuestBook::create([
                'name'  => $faker->name(),
                'date'  => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'instansi'  => $faker->company(3),
                'jumlah'  => $faker->randomDigit(),
                'keperluan'  => $faker->sentence()
            ]);
        }
    }
}
