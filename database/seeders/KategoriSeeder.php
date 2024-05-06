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
                'name' => ucwords(strtolower('LHKASN')),
                'slug' => Str::slug('LHKASN', '-'),
            ],
            [
                'name' => ucwords(strtolower('Perjanjian Kinerja')),
                'slug' => Str::slug('Perjanjian Kinerja', '-'),
            ],
            [
                'name' => ucwords(strtolower('CaLK')),
                'slug' => Str::slug('CaLK', '-'),
            ],
            [
                'name' => ucwords(strtolower('Laporan Aset')),
                'slug' => Str::slug('Laporan Aset', '-'),
            ],
            [
                'name' => ucwords(strtolower('Renja')),
                'slug' => Str::slug('Renja', '-'),
            ],
            [
                'name' => ucwords(strtolower('Renstra')),
                'slug' => Str::slug('Renstra', '-'),
            ],
            [
                'name' => ucwords(strtolower('POBL')),
                'slug' => Str::slug('POBL', '-'),
            ],
            [
                'name' => ucwords(strtolower('Program Kegiatan')),
                'slug' => Str::slug('Program Kegiatan', '-'),
            ],
            [
                'name' => ucwords(strtolower('Realisasi Anggaran')),
                'slug' => Str::slug('Realisasi Anggaran', '-'),
            ],
            [
                'name' => ucwords(strtolower('LKjIP')),
                'slug' => Str::slug('LKjIP', '-'),
            ],
            [
                'name' => ucwords(strtolower('DPA')),
                'slug' => Str::slug('DPA', '-'),
            ],
            [
                'name' => ucwords(strtolower('RKA')),
                'slug' => Str::slug('RKA', '-'),
            ],
            [
                'name' => ucwords(strtolower('NERACA')),
                'slug' => Str::slug('NERACA', '-'),
            ],
        ];

        Tag::insert($data);
    }
}
