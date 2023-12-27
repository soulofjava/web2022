<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $component = [
            [
                'name' => 'Agenda',
                'active' => 0,
                'slug' => Str::slug('Agenda', '-'),
            ],
            [
                'name' => 'Buku Tamu',
                'active' => 0,
                'slug' => Str::slug('Buku Tamu', '-'),
            ],
            [
                'name' => 'Seputar Wonosobo',
                'active' => 0,
                'slug' => Str::slug('Seputar Wonosobo', '-'),
            ],
            [
                'name' => 'Download Area',
                'active' => 0,
                'slug' => Str::slug('Download Area', '-'),
            ],
            // [
            //     'name' => 'Layanan',
            //     'active' => 1,
            //     'slug' => Str::slug('Layanan', '-'),
            // ],
            // satpolpp
            [
                'name' => 'Aduan Masyarakat',
                'active' => 0,
                'slug' => Str::slug('Complaints', '-'),
            ],
            [
                'name' => 'Berita',
                'active' => 0,
                'slug' => Str::slug('Berita', '-'),
            ],
        ];

        foreach ($component as $cp) {
            Component::create($cp);
        }
    }
}
