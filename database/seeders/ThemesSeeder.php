<?php

namespace Database\Seeders;

use App\Models\Themes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            ],
            [
                'name' => 'appway',
                'image' => 'img/appway.png'
            ],
            [
                'name' => 'blubuild',
                'image' => 'img/blubuild.png'
            ],
            [
                'name' => 'atorn',
                'image' => 'img/atorn.png'
            ],
            [
                'name' => 'anada',
                'image' => 'img/anada.png'
            ]
        ];

        foreach ($themes as $datum) {
            Themes::create($datum);
        }
    }
}
