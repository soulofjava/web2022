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
            // RegionSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        DB::table('websites')->insert([
            'web_name' => 'CASN Kabupaten Wonosobo',
            'web_description' => 'Seleksi Penerimaan CASN Pemerintah Kab. Wonosobo',
            'email' => 'casn.bkdwonosobo@gmail.com',
            'address' => 'Jln. Soekarno-Hatta No. 3 56311',
            'phone' => '0821-4072-9933 / (0286) 321221',
            'instagram' => 'https://www.instagram.com/diskominfo_wonosobo/?hl=id',
            'twitter' => 'https://twitter.com/diskominfo_wsb',
            'facebook' => 'https://www.facebook.com/wonosobohebat/',
            'youtube' => 'https://www.youtube.com/@bappedawonosobo7742',
            'url_stream' => '#',
            'latitude' => '-7.356736983762923',
            'longitude' => '109.90523099899293',
            'themes_front' => 'pixel',
            'themes_back' => 'back.a',
            'open_hours' => "Senin - Kamis (07:00 - 16:00 WIB) Jum'at (07:00 - 11:00 WIB)",
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
