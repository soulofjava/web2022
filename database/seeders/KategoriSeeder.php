<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::truncate();
        $data = [
            [
                'name' => 'LHKASN',
                'slug' => Str::slug('LHKASN', '-'),
            ],
            [
                'name' => 'Perjanjian Kinerja',
                'slug' => Str::slug('Perjanjian Kinerja', '-'),
            ],
            [
                'name' => 'CaLK',
                'slug' => Str::slug('CaLK', '-'),
            ],
            [
                'name' => 'Laporan Aset',
                'slug' => Str::slug('Laporan Aset', '-'),
            ],
            [
                'name' => 'Renja',
                'slug' => Str::slug('Renja', '-'),
            ],
            [
                'name' => 'Renstra',
                'slug' => Str::slug('Renstra', '-'),
            ],
            [
                'name' => 'POBL',
                'slug' => Str::slug('POBL', '-'),
            ],
            [
                'name' => 'Program Kegiatan',
                'slug' => Str::slug('Program Kegiatan', '-'),
            ],
            [
                'name' => 'Realisasi Anggaran',
                'slug' => Str::slug('Realisasi Anggaran', '-'),
            ],
            [
                'name' => 'LKjIP',
                'slug' => Str::slug('LKjIP', '-'),
            ],
            [
                'name' => 'DPA',
                'slug' => Str::slug('DPA', '-'),
            ],
            [
                'name' => 'RKA',
                'slug' => Str::slug('RKA', '-'),
            ],
            [
                'name' => 'NERACA',
                'slug' => Str::slug('NERACA', '-'),
            ],
        ];
        Tag::insert($data);
    }
}
