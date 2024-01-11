<?php

namespace Database\Seeders;

use App\Models\FrontMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Themes;
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
        $this->call([
            // NewsSeeder::class,
            // GallerySeeder::class,
        ]);

        $themes = [
            [
                'name' => 'flexstart',
                'image' => 'img/flexstart.png'
            ],
            [
                'name' => 'herobiz',
                'image' => 'img/herobiz.png'
            ],
            [
                'name' => 'arsha',
                'image' => 'img/arsha.png'
            ]
        ];

        foreach ($themes as $datum) {
            Themes::create($datum);
        }

        $role = [
            [
                'role' => 'Superadmin'
            ],
            [
                'role' => 'Admin'
            ]
        ];

        foreach ($role as $datum) {
            Role::create($datum);
        }

        // \App\Models\User::factory(10)->create();
        DB::table('websites')->insert([
            'web_name' => 'Web2022',
            'web_description' => '"Hello World!"',
            'email' => 'superadmin@app.com',
            'address' => 'On Earth!',
            'phone' => '-',
            'instagram' => '#',
            'twitter' => '#',
            'facebook' => '#',
            'youtube' => '#',
            'url_stream' => '#',
            'themes_front' => 'arsha',
            'themes_back' => 'back.a',
        ]);
        // DB::table('websites')->insert([
        //     'web_name' => 'KAMPUNG PANCASILA WONOSOBO',
        //     'web_description' => '"Semarak Kampung Pancasila Wonosobo penjaga Persatuan dan Kesatuan Bangsa!"',
        //     'email' => 'superadmin@app.com',
        //     'address' => 'Kodim 0707 Jl. Pemuda No.11, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311',
        //     'phone' => '(0286) 321019',
        //     'instagram' => '#',
        //     'twitter' => '#',
        //     'facebook' => '#',
        //     'youtube' => '#',
        //     'url_stream' => '#',
        //     'themes_front' => 'FlexStart',
        //     'themes_back' => 'back.a',
        // ]);

        $user = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@app.com',
                'password' => bcrypt('password'),
                'role_id' => 1
            ],
            [
                'name' => 'admin',
                'email' => 'admin@app.com',
                'password' => bcrypt('password'),
                'role_id' => 2
            ]
        ];

        foreach ($user as $datum) {
            User::create($datum);
        }
    }
}
