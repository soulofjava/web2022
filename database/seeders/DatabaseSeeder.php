<?php

namespace Database\Seeders;

use App\Models\RelatedLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use Faker\Factory as Faker;
=======
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e

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
<<<<<<< HEAD
            // FrontMenuSeeder::class,
            ThemesSeeder::class,
            ComCodes::class,
            PermissionSeeder::class,
            ComponentSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        DB::table('websites')->insert([
            'web_name' => 'Puskesmas Kaliwiro',
            'web_description' => '"Hello World!"',
            'email' => 'pkmxwiro@gmail.com',
            'address' => 'Jln. Selomanik No.02 Kaliwiro Wonosobo',
            'phone' => '081390087602 / 088229758069',
            'instagram' => 'https://www.instagram.com/puskesmaskaliwiro/',
            'twitter' => 'https://twitter.com/diskominfo_wsb',
            'facebook' => 'https://www.facebook.com/p/Puskesmas-Kaliwiro-100066666039544/',
            'youtube' => 'https://www.youtube.com/@puskesmaskaliwirotv',
            'url_stream' => '#',
            'themes_front' => 'flexstart',
            'themes_back' => 'back.a',
            'open_hours' => "Senin - Kamis (08:00 - 12:00 WIB) Jum'at - Sabtu (08:00 - 10:00 WIB)",
=======
            FrontMenuSeeder::class,
            ComCodes::class,
            ViewSeeder::class,
        ]);

        DB::table('websites')->insert([
            'web_name' => 'Website Resmi Kabupaten Wonosobo',
            'web_description' => '"Hello World!"',
            'email' => 'pemkab@wonosobokab.go.id',
            'address' => 'JL. Soekarno-Hatta, No. 2-4, Kel. Wonosobo Timur, Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311',
            'phone' => '(0286) 321345',
            'instagram' => 'https://www.instagram.com/wonosobohebat/',
            'twitter' => 'https://twitter.com/wonosobohebat',
            'facebook' => 'https://www.facebook.com/wonosobohebat',
            'youtube' => 'https://www.youtube.com/@OfficialWonosoboTV',
            'latitude' => '-7.358664418685239',
            'longitude' => '109.9047188187568',
            'open_hours' => "Senin - Kamis (07:00 - 16:00) Jum'at (07:00 - 11:00)",
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
        ]);

        $related = [
            [
                'name' => 'JDIH',
                'url' => 'https://jdih.wonosobokab.go.id/',
            ],
            [
                'name' => 'FLLAJ',
                'url' => 'https://fllaj.wonosobokab.go.id/',
            ],
            [
                'name' => 'CASN',
                'url' => 'https://casn.wonosobokab.go.id/',
            ],
            [
                'name' => 'JELAJAH',
                'url' => 'https://www.jelajahwonosobo.com/',
            ],
            [
                'name' => 'CEK HOAX',
                'url' => 'https://www.kominfo.go.id/content/all/laporan_isu_hoaks',
            ],
            [
                'name' => 'LAPORBUP',
                'url' => 'https://laporbupati.wonosobokab.go.id/',
            ]
        ];

        foreach ($related as $rr) {
            RelatedLink::create($rr);
        }
    }
}
