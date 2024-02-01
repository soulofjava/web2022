<?php

namespace Database\Seeders;

use App\Models\FrontMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class FrontMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $front_menu = [
            // root menu
            [
                'menu_name' => 'Main Menu'
            ],
            // menu profil
            [
                'menu_parent' => '1',
                'menu_name' => 'Profil',
                'menu_url' => Str::slug('Profil', '-')
            ],
            [
                'menu_parent' => '2',
                'menu_name' => 'Profil OPD',
                'menu_url' => Str::slug('Profil OPD', '-')
            ],
            [
                'menu_parent' => '2',
                'menu_name' => 'Profil Pimpinan OPD',
                'menu_url' => Str::slug('Profil Pimpinan OPD', '-')
            ],
            [
                'menu_parent' => '2',
                'menu_name' => 'Visi Misi',
                'menu_url' => Str::slug('Visi Misi', '-')
            ],
            [
                'menu_parent' => '2',
                'menu_name' => 'Tupoksi',
                'menu_url' => Str::slug('Tupoksi', '-')
            ],
            [
                'menu_parent' => '2',
                'menu_name' => 'Personil',
                'menu_url' => Str::slug('Personil', '-')
            ],
            [
                'menu_parent' => '2',
                'menu_name' => 'Struktur',
                'menu_url' => Str::slug('Struktur', '-')
            ],
            // submenu profil pimpinan opd
            [
                'menu_parent' => '4',
                'menu_name' => 'Profil Pimpinan',
                'menu_url' => Str::slug('Profil Pimpinan', '-')
            ],
            [
                'menu_parent' => '4',
                'menu_name' => 'LHKPN Pimpinan',
                'menu_url' => Str::slug('LHKPN Pimpinan', '-')
            ],
            [
                'menu_parent' => '4',
                'menu_name' => 'Agenda Pimpinan',
                'menu_url' => Str::slug('Agenda Pimpinan', '-')
            ],
            // menu ppid
            [
                'menu_parent' => '1',
                'menu_name' => 'PPID',
                'menu_url' => Str::slug('PPID', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Profil PPID',
                'menu_url' => Str::slug('Profil PPID', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Daftar Informasi Publik',
                'menu_url' => Str::slug('Daftar Informasi Publik', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'SK PPID',
                'menu_url' => Str::slug('SK PPID', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Produk Hukum',
                'menu_url' => Str::slug('Produk Hukum', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Gallery PPID',
                'menu_url' => Str::slug('Gallery PPID', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'SOP PPID',
                'menu_url' => Str::slug('SOP PPID', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Alur Permohonan Informasi',
                'menu_url' => Str::slug('Alur Permohonan Informasi', '-')
            ],
            // profil ppid
            [
                'menu_parent' => '13',
                'menu_name' => 'Profil Singkat',
                'menu_url' => Str::slug('Profil Singkat', '-')
            ],
            [
                'menu_parent' => '13',
                'menu_name' => 'Tugas PPID',
                'menu_url' => Str::slug('Tugas PPID', '-')
            ],
            [
                'menu_parent' => '13',
                'menu_name' => 'Maklumat PPID',
                'menu_url' => Str::slug('Maklumat PPID', '-')
            ],
            [
                'menu_parent' => '13',
                'menu_name' => 'Struktur PPID',
                'menu_url' => Str::slug('Struktur PPID', '-')
            ],
            // submenu produk hukum
            [
                'menu_parent' => '16',
                'menu_name' => 'JDIH Wonosobo',
                'menu_url' => Str::slug('JDIH Wonosobo', '-')
            ],
            [
                'menu_parent' => '16',
                'menu_name' => 'SK DIP',
                'menu_url' => Str::slug('SK DIP', '-')
            ],
            [
                'menu_parent' => '16',
                'menu_name' => 'SK DIK',
                'menu_url' => Str::slug('SK DIK', '-')
            ],
            // submenu sop ppid
            [
                'menu_parent' => '18',
                'menu_name' => 'SOP Pelayanan Informasi Publik',
                'menu_url' => Str::slug('SOP Pelayanan Informasi Publik', '-')
            ],
            [
                'menu_parent' => '18',
                'menu_name' => 'SOP Penanganan Keberatan',
                'menu_url' => Str::slug('SOP Penanganan Keberatan', '-')
            ],
            // menu transparansi
            [
                'menu_parent' => '1',
                'menu_name' => 'Transparansi',
                'menu_url' => Str::slug('Transparansi', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'LHKASN',
                'menu_url' => Str::slug('LHKASN', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'Perjanjian Kinerja',
                'menu_url' => Str::slug('Perjanjian Kinerja', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'CaLK',
                'menu_url' => Str::slug('CaLK', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'Laporan Aset',
                'menu_url' => Str::slug('Laporan Aset', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'Renja',
                'menu_url' => Str::slug('Renja', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'Renstra',
                'menu_url' => Str::slug('Renstra', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'POBL',
                'menu_url' => Str::slug('POBL', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'Program Kegiatan',
                'menu_url' => Str::slug('Program Kegiatan', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'Realisasi Anggaran',
                'menu_url' => Str::slug('Realisasi Anggaran', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'LKjIP',
                'menu_url' => Str::slug('LKjIP', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'DPA',
                'menu_url' => Str::slug('DPA', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'RKA',
                'menu_url' => Str::slug('RKA', '-')
            ],
            [
                'menu_parent' => '29',
                'menu_name' => 'Neraca',
                'menu_url' => Str::slug('Neraca', '-')
            ],
            // layanan menu
            [
                'menu_parent' => '1',
                'menu_name' => 'Layanan',
                'menu_url' => Str::slug('Layanan', '-')
            ],
            // layanan sub menu
            [
                'menu_parent' => '43',
                'menu_name' => 'Permohonan Informasi Publik',
                'menu_url' => Str::slug('Permohonan Informasi Publik', '-')
            ],
            [
                'menu_parent' => '43',
                'menu_name' => 'Pengajuan Keberatan Informasi Publik',
                'menu_url' => Str::slug('Pengajuan Keberatan Informasi Publik', '-')
            ],
        ];

        foreach ($front_menu as $menu) {
            FrontMenu::create($menu);
        }
    }
}
