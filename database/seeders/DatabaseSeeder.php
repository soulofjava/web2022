<?php

namespace Database\Seeders;

use App\Models\RelatedLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ViewSeeder::class,
            KategoriSeeder::class,
            // RegionSeeder::class,
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
            'themes_front' => 'detox',
            'themes_back' => 'back.sneat',
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
    }
}
