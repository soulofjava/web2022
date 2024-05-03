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
        $items = [
            [
                'name' => 'Agenda',
                'active' => 0,
                'slug' => Str::slug('Agenda', '-'),
                'icon' => 'bx bx-calendar', // menggunakan kelas ikon Boxicons untuk kalender
                'url' => 'event', // URL untuk Agenda
            ],
            [
                'name' => 'Download Area',
                'active' => 0,
                'slug' => Str::slug('Download Area', '-'),
                'icon' => 'bx bx-download', // menggunakan kelas ikon Boxicons untuk download
                'url' => 'download', // URL untuk Download Area
            ],
            [
                'name' => 'Pinjam Tempat',
                'active' => 0,
                'slug' => Str::slug('Pinjam Tempat', '-'),
                'icon' => 'bx bx-building-house', // menggunakan kelas ikon Boxicons untuk bangunan
                'url' => 'pinjamtempat', // URL untuk Pinjam Tempat
            ],
            [
                'name' => 'Buku Tamu',
                'active' => 0,
                'slug' => Str::slug('Buku Tamu', '-'),
                'icon' => 'bx bx-book', // menggunakan kelas ikon Boxicons untuk buku
                'url' => '/buku-tamu', // URL untuk Buku Tamu
            ],
            [
                'name' => 'Seputar Wonosobo',
                'active' => 0,
                'slug' => Str::slug('Seputar Wonosobo', '-'),
                'icon' => 'bx bx-world', // menggunakan kelas ikon Boxicons untuk dunia
                'url' => '/seputar-wonosobo', // URL untuk Seputar Wonosobo
            ],
            [
                'name' => 'Aduan Masyarakat',
                'active' => 0,
                'slug' => Str::slug('Complaints', '-'),
                'icon' => 'bx bx-error-circle', // menggunakan kelas ikon Boxicons untuk peringatan
                'url' => '/aduan-masyarakat', // URL untuk Aduan Masyarakat
            ],
            [
                'name' => 'Berita',
                'active' => 0,
                'slug' => Str::slug('Berita', '-'),
                'icon' => 'bx bx-news', // menggunakan kelas ikon Boxicons untuk berita
                'url' => '/berita', // URL untuk Berita
            ],

        ];

        Component::insert($items);
    }
}
