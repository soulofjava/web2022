<?php

namespace Database\Seeders;

use App\Models\FrontMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('front_menus')->truncate();

        $front_menu = [
            [
                'menu_name' => 'Main Menu'
            ],

            [
                'menu_parent' => '1',
                'menu_name' => 'Tentang Kami',
                'menu_url' => Str::slug('Tentang Kami', '-')
            ],
            [
                'menu_parent' => '2',
<<<<<<< HEAD
                'menu_name' => 'Profil OPD',
                'menu_url' => Str::slug('Profil OPD', '-')
=======
                'menu_name' => 'Fasilitas Publik',
                'menu_url' => Str::slug('Fasilitas Publik', '-')
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Ruang Publik',
                'menu_url' => Str::slug('Ruang Publik', '-')
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Layanan Umum',
                'menu_url' => Str::slug('Layanan Umum', '-')
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Layanan Kesehatan',
                'menu_url' => Str::slug('Layanan Kesehatan', '-')
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Layanan Perbankan',
                'menu_url' => Str::slug('Layanan Perbankan', '-')
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Layanan Transparansi',
                'menu_url' => Str::slug('Layanan Transparansi', '-')
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Tempat Ibadah',
                'menu_url' => Str::slug('Tempat Ibadah', '-')
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Radio',
                'menu_url' => Str::slug('Radio', '-')
            ],
            [
                'menu_parent' => '3',
                'menu_name' => 'Jelajah Wonosobo',
                'link' => 1,
                'menu_url' => 'https://www.jelajahwonosobo.com/'
            ],

            [
                'menu_parent' => '2',
                'menu_name' => 'Layanan Publik Online',
                'menu_url' => Str::slug('Layanan Publik Online', '-')
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Harga Kebutuhan Pokok',
                'link' => 1,
                'menu_url' => 'https://dashboard.wonosobokab.go.id/dashboard/disdagkopukm'
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Lalu Lintas Wonosobo',
                'link' => 1,
                'menu_url' => 'https://lalulintas.wonosobokab.go.id/'
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Open Data Desa',
                'link' => 1,
                'menu_url' => 'https://datadesa.wonosobokab.go.id/'
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Cek Status Perizinan',
                'link' => 1,
                'menu_url' => 'https://dpmptsp.wonosobokab.go.id/postings/detail/53/CEK_STATUS_IZIN_ONLINE.HTML'
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'Pelayanan Dinda Cantik',
                'link' => 1,
                'menu_url' => 'https://bppkad.wonosobokab.go.id/index.php/185-pelayanan-online'
            ],
            [
                'menu_parent' => '12',
                'menu_name' => 'e-Lapak',
                'link' => 1,
                'menu_url' => 'https://e-lapak.wonosobokab.go.id/'
            ],

            [
                'menu_parent' => '2',
                'menu_name' => 'Potensi Daerah',
                'menu_url' => Str::slug('Potensi Daerah', '-')
            ],
            [
                'menu_parent' => '19',
                'menu_name' => 'Potensi Investasi Kabupaten Wonosobo',
                'menu_url' => Str::slug('Potensi Investasi Kabupaten Wonosobo', '-')
            ],
            [
                'menu_parent' => '19',
                'menu_name' => 'Daftar Investasi',
                'menu_url' => Str::slug('Daftar Investasi', '-')
            ],
            [
                'menu_parent' => '21',
                'menu_name' => 'Penyertaan Modal',
                'menu_url' => Str::slug('Penyertaan Modal', '-')
            ],
            [
                'menu_parent' => '21',
                'menu_name' => 'Investasi Usaha',
                'menu_url' => Str::slug('Investasi Usaha', '-')
            ],

            [
                'menu_parent' => '2',
                'menu_name' => 'Selayang Pandang',
                'menu_url' => Str::slug('Selayang Pandang', '-')
            ],
            [
                'menu_parent' => '24',
                'menu_name' => 'Sejarah Singkat Kabupaten Wonosobo',
                'menu_url' => Str::slug('Sejarah Singkat Kabupaten Wonosobo', '-')
            ],
            [
                'menu_parent' => '24',
                'menu_name' => 'Arti Lambang Daerah',
                'menu_url' => Str::slug('Arti Lambang Daerah', '-')
            ],
            [
                'menu_parent' => '24',
                'menu_name' => 'Peta Pengembangan Wilayah',
                'menu_url' => Str::slug('Peta Pengembangan Wilayah', '-')
            ],
            [
                'menu_parent' => '24',
                'menu_name' => 'Geografis Kabupaten Wonosobo',
                'menu_url' => Str::slug('Geografis Kabupaten Wonosobo', '-')
            ],
            [
                'menu_parent' => '24',
                'menu_name' => 'Visi Misi',
                'menu_url' => Str::slug('Visi Misi', '-')
            ],

            [
                'menu_parent' => '2',
<<<<<<< HEAD
                'menu_name' => 'Tupoksi',
                'menu_url' => Str::slug('Tupoksi', '-')
=======
                'menu_name' => 'Geopark Dieng',
                'menu_url' => 'https://geoparkdieng.com/',
                'link' => '1',
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
            ],
            [
                'menu_parent' => '2',
                'menu_name' => 'Agenda Badan Publik',
                'link' => 1,
                'menu_url' => 'https://panda.wonosobokab.go.id/red'
            ],

            [
                'menu_parent' => '1',
                'menu_name' => 'Kepemerintahan',
                'menu_url' => Str::slug('Kepemerintahan', '-')
            ],
            [
<<<<<<< HEAD
                'menu_parent' => '2',
                'menu_name' => 'Struktur',
                'menu_url' => Str::slug('Struktur', '-')
            ],
            // submenu profil pimpinan opd
            [
                'menu_parent' => '4',
                'menu_name' => 'Profil Pimpinan',
                'menu_url' => Str::slug('Profil Pimpinan', '-')
=======
                'menu_parent' => '32',
                'menu_name' => 'Profil Bupati dan Wakil Bupati',
                'menu_url' => Str::slug('Profil Bupati dan Wakil Bupati', '-')
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
            ],
            [
                'menu_parent' => '33',
                'menu_name' => 'Bupati',
                'menu_url' => Str::slug('Bupati', '-')
            ],
            [
<<<<<<< HEAD
                'menu_parent' => '4',
                'menu_name' => 'Agenda Pimpinan',
                'menu_url' => Str::slug('Agenda Pimpinan', '-')
=======
                'menu_parent' => '33',
                'menu_name' => 'Wakil Bupati',
                'menu_url' => Str::slug('Wakil Bupati', '-')
            ],
            [
                'menu_parent' => '32',
                'menu_name' => 'Forkopimda Wonosobo',
                'menu_url' => Str::slug('Forkopimda Wonosobo', '-')
            ],
            [
                'menu_parent' => '32',
                'menu_name' => 'DPRD',
                'menu_url' => Str::slug('DPRD', '-')
            ],
            [
                'menu_parent' => '37',
                'menu_name' => 'Profil Pimpinan DPRD Kab Wonosobo 2020-2024',
                'menu_url' => Str::slug('Profil Pimpinan DPRD Kab Wonosobo 2020-2024', '-')
            ],
            [
                'menu_parent' => '32',
                'menu_name' => 'STAF AHLI BUPATI',
                'menu_url' => Str::slug('STAF AHLI BUPATI', '-')
            ],
            [
                'menu_parent' => '32',
                'menu_name' => 'OPD',
                'menu_url' => Str::slug('OPD', '-')
            ],
            [
                'menu_parent' => '40',
                'menu_name' => 'Sekretariat Daerah Wonosobo',
                'menu_url' => Str::slug('Sekretariat Daerah Wonosobo', '-')
            ],
            [
                'menu_parent' => '40',
                'menu_name' => 'Perangkat Daerah Wonosobo',
                'menu_url' => Str::slug('Perangkat Daerah Wonosobo', '-')
            ],
            [
                'menu_parent' => '40',
                'menu_name' => 'Camat se-Kab. Wonosobo',
                'menu_url' => Str::slug('Camat se-Kab. Wonosobo', '-')
            ],
            [
                'menu_parent' => '40',
                'menu_name' => 'Tupoksi OPD',
                'menu_url' => Str::slug('Tupoksi OPD', '-')
            ],
            [
                'menu_parent' => '32',
                'menu_name' => 'Produk Hukum',
                'menu_url' => Str::slug('Produk Hukum', '-')
            ],
            [
                'menu_parent' => '45',
                'menu_name' => 'JDIH Wonosobo',
                'menu_url' => 'https://jdih.wonosobokab.go.id/',
                'link' => 1
            ],
            [
                'menu_parent' => '45',
                'menu_name' => 'Kerjasama Daerah',
                'link' => 1,
                'menu_url' => 'https://asiksobo.wonosobokab.go.id/'
            ],
            [
                'menu_parent' => '1',
                'menu_name' => 'Berita',
                'link' => 1,
                'menu_url' => '/newsall'
            ],
            [
                'menu_parent' => '1',
                'menu_name' => 'Transparansi Anggaran',
                'menu_url' => Str::slug('Transparansi Anggaran', '-')
            ],
            [
                'menu_parent' => '1',
                'menu_name' => 'Info',
                'menu_url' => Str::slug('Info', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Prosedur Siaga Bencana',
                'menu_url' => Str::slug('Prosedur Siaga Bencana', '-')
            ],
            [
                'menu_parent' => '51',
                'menu_name' => 'Prosedur Peringatan Dini dan Evakuasi',
                'menu_url' => Str::slug('Prosedur Peringatan Dini dan Evakuasi', '-')
            ],
            [
                'menu_parent' => '51',
                'menu_name' => 'Buku Saku Siaga Bencana',
                'menu_url' => Str::slug('Buku Saku Siaga Bencana', '-')
            ],
            [
                'menu_parent' => '51',
                'menu_name' => 'Informasi Kejadian Bencana',
                'menu_url' => Str::slug('Informasi Kejadian Bencana', '-')
            ],
            [
                'menu_parent' => '51',
                'menu_name' => 'Daftar Kejadian Bencana',
                'menu_url' => Str::slug('Daftar Kejadian Bencana', '-')
            ],
            [
                'menu_parent' => '51',
                'menu_name' => 'Pantauan Bencana',
                'menu_url' => Str::slug('Pantauan Bencana', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Pengumuman',
                'menu_url' => Str::slug('Pengumuman', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Lowongan Kerja',
                'menu_url' => Str::slug('Lowongan Kerja', '-')
            ],
            [
                'menu_parent' => '58',
                'menu_name' => 'CASN',
                'link' => 1,
                'menu_url' => 'https://casn.wonosobokab.go.id/'
            ],
            [
                'menu_parent' => '58',
                'menu_name' => 'Selter JPTP',
                'link' => 1,
                'menu_url' => 'https://selter-jptp.wonosobokab.go.id/'
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Informasi Gangguan',
                'menu_url' => Str::slug('Informasi Gangguan', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Informasi Hoax',
                'menu_url' => Str::slug('Informasi Hoax', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Pengaduan Masyarakat',
                'menu_url' => Str::slug('Pengaduan Masyarakat', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Hasil Penanganan Pengaduan',
                'menu_url' => Str::slug('Hasil Penanganan Pengaduan', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Kajian dan Penelitian',
                'menu_url' => Str::slug('Kajian dan Penelitian', '-')
            ],
            [
                'menu_parent' => '50',
                'menu_name' => 'Pengawasan Internal',
                'menu_url' => Str::slug('Pengawasan Internal', '-')
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
            ],
            [
                'menu_parent' => '1',
                'menu_name' => 'PPID',
                'menu_url' => Str::slug('PPID', '-')
            ],

            [
                'menu_parent' => '67',
                'menu_name' => 'Profil PPID',
                'menu_url' => Str::slug('Profil PPID', '-')
            ],

            [
                'menu_parent' => '68',
                'menu_name' => 'Profil',
                'menu_url' => Str::slug('Profil', '-')
            ],
            [
<<<<<<< HEAD
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
=======
                'menu_parent' => '68',
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
                'menu_name' => 'Maklumat PPID',
                'menu_url' => Str::slug('Maklumat PPID', '-')
            ],
            [
                'menu_parent' => '68',
                'menu_name' => 'Visi Misi',
                'menu_url' => Str::slug('Visi Misi', '-')
            ],
            [
                'menu_parent' => '68',
                'menu_name' => 'Tugas Pokok dan Fungsi',
                'menu_url' => Str::slug('Tugas Pokok dan Fungsi', '-')
            ],
            [
                'menu_parent' => '68',
                'menu_name' => 'Bagan Struktur',
                'menu_url' => Str::slug('Bagan Struktur', '-')
            ],
            [
                'menu_parent' => '68',
                'menu_name' => 'Dasar Hukum Pembentukan',
                'menu_url' => Str::slug('Dasar Hukum Pembentukan', '-')
            ],
            [
                'menu_parent' => '68',
                'menu_name' => 'Daftar PPID Pelaksana',
                'menu_url' => Str::slug('Daftar PPID Pelaksana', '-')
            ],
            [
                'menu_parent' => '67',
                'menu_name' => 'Daftar Informasi',
                'menu_url' => Str::slug('Daftar Informasi', '-')
            ],
            [
                'menu_parent' => '76',
                'menu_name' => 'Daftar Informasi Publik',
                'menu_url' => Str::slug('Daftar Informasi Publik', '-')
            ],
            [
                'menu_parent' => '76',
                'menu_name' => 'Daftar Informasi yang Dikecualikan',
                'menu_url' => Str::slug('Daftar Informasi yang Dikecualikan', '-')
            ],
            [
                'menu_parent' => '67',
                'menu_name' => 'Regulasi PPID',
                'menu_url' => Str::slug('Regulasi PPID', '-')
            ],
            [
                'menu_parent' => '79',
                'menu_name' => 'Regulasi Informasi Publik',
                'menu_url' => Str::slug('Regulasi Informasi Publik', '-')
            ],
            [
                'menu_parent' => '67',
                'menu_name' => 'Pelayanan Informasi',
                'menu_url' => Str::slug('Pelayanan Informasi', '-')
            ],
            [
                'menu_parent' => '81',
                'menu_name' => 'Standar Pelayanan',
                'menu_url' => Str::slug('Standar Pelayanan', '-')
            ],
            [
                'menu_parent' => '82',
                'menu_name' => 'Prosedur Layanan Informasi Publik',
                'menu_url' => Str::slug('Prosedur Layanan Informasi Publik', '-')
            ],
            [
                'menu_parent' => '82',
                'menu_name' => 'Prosedur Pengajuan Keberatan Informasi Publik',
                'menu_url' => Str::slug('Prosedur Pengajuan Keberatan Informasi Publik', '-')
            ],
            [
                'menu_parent' => '81',
                'menu_name' => 'Standar Operasional Prosedur',
                'menu_url' => Str::slug('Standar Operasional Prosedur', '-')
            ],
            [
<<<<<<< HEAD
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
=======
                'menu_parent' => '81',
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
                'menu_name' => 'Permohonan Informasi Publik',
                'menu_url' => Str::slug('Permohonan Informasi Publik', '-')
            ],
            [
                'menu_parent' => '81',
                'menu_name' => 'Layanan Informasi Non Elektronik',
                'menu_url' => Str::slug('Layanan Informasi Non Elektronik', '-')
            ],
            [
                'menu_parent' => '81',
                'menu_name' => 'Laporan Layanan Informasi',
                'menu_url' => Str::slug('Laporan Layanan Informasi', '-')
            ],
            [
                'menu_parent' => '49',
                'menu_name' => 'Rencana',
                'menu_url' => Str::slug('Rencana', '-')
            ],
            [
                'menu_parent' => '49',
                'menu_name' => 'Anggaran Kegiatan',
                'menu_url' => Str::slug('Anggaran Kegiatan', '-')
            ],
            [
                'menu_parent' => '49',
                'menu_name' => 'Laporan',
                'menu_url' => Str::slug('Laporan', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'RPJMD',
                'menu_url' => Str::slug('RPJMD', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'RKPD',
                'menu_url' => Str::slug('RKPD', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'KUA PPAS',
                'menu_url' => Str::slug('KUA PPAS', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'PK',
                'menu_url' => Str::slug('PK', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'Program dan Kegiatan',
                'menu_url' => Str::slug('Program dan Kegiatan', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'RUP',
                'menu_url' => Str::slug('RUP', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'PBJ',
                'menu_url' => Str::slug('PBJ', '-')
            ],
            [
                'menu_parent' => '89',
                'menu_name' => 'Kebijakan',
                'menu_url' => Str::slug('Kebijakan', '-')
            ],
            [
                'menu_parent' => '98',
                'menu_name' => 'LPSE',
                'link' => 1,
                'menu_url' => 'http://lpse.wonosobokab.go.id/eproc4/lelang',
            ],
            [
                'menu_parent' => '98',
                'menu_name' => 'Info Pengadaan',
                'menu_url' => Str::slug('Info Pengadaan', '-')
            ],
            [
                'menu_parent' => '90',
                'menu_name' => 'RAPERDA APBD',
                'menu_url' => Str::slug('RAPERDA APBD', '-')
            ],
            [
                'menu_parent' => '90',
                'menu_name' => 'APBD',
                'menu_url' => Str::slug('APBD', '-')
            ],
            [
                'menu_parent' => '90',
                'menu_name' => 'APBD Perubahan',
                'menu_url' => Str::slug('APBD Perubahan', '-')
            ],
            [
                'menu_parent' => '90',
                'menu_name' => 'RKA',
                'menu_url' => Str::slug('RKA', '-')
            ],
            [
                'menu_parent' => '90',
                'menu_name' => 'DPA',
                'menu_url' => Str::slug('DPA', '-')
            ],
            [
                'menu_parent' => '90',
                'menu_name' => 'KAK-TOR',
                'menu_url' => Str::slug('KAK-TOR', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LKJIP',
                'menu_url' => Str::slug('LKJIP', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LKPJ',
                'menu_url' => Str::slug('LKPJ', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LPPD',
                'menu_url' => Str::slug('LPPD', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LRPBPD',
                'menu_url' => Str::slug('LRPBPD', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LAK',
                'menu_url' => Str::slug('LAK', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LRA',
                'menu_url' => Str::slug('LRA', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'NERACA',
                'menu_url' => Str::slug('NERACA', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'CALK',
                'menu_url' => Str::slug('CALK', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'ASET & INVENTARIS',
                'menu_url' => Str::slug('ASET & INVENTARIS', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LKPD dan OPINI BPK',
                'menu_url' => Str::slug('LKPD dan OPINI BPK', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'BUMD',
                'menu_url' => Str::slug('BUMD', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LELANG LPSE',
                'menu_url' => Str::slug('LELANG LPSE', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'LHKPN',
                'menu_url' => Str::slug('LHKPN', '-')
            ],
            [
                'menu_parent' => '91',
                'menu_name' => 'Bantuan Keuangan',
                'menu_url' => Str::slug('Bantuan Keuangan', '-')
            ],
            [
                'menu_parent' => '121',
                'menu_name' => 'CSR',
                'menu_url' => Str::slug('CSR', '-')
            ],

        ];

        foreach ($front_menu as $menu) {
            FrontMenu::create($menu);
        }
    }
}
