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
        ]);

        // \App\Models\User::factory(10)->create();
        DB::table('websites')->insert([
            'web_name' => 'Web2022',
            'web_description' => '"Hello World!"',
            'email' => 'diskominfo@wonosobokab.go.id',
            'address' => 'Wonosobo - The Soul Of Java',
            'phone' => '085643710007',
            'instagram' => 'https://www.instagram.com/diskominfo_wonosobo/?hl=id',
            'twitter' => 'https://twitter.com/diskominfo_wsb',
            'facebook' => 'https://www.facebook.com/wonosobohebat/',
            'youtube' => 'https://www.youtube.com/c/OfficialWonosoboTV',
            'url_stream' => '#',
            'themes_front' => 'flexstart',
            'themes_back' => 'back.a',
            'open_hours' => 'Monday - Thursday (07:00AM - 04:00PM) Friday (07:00AM - 11:00AM)',
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
