<?php

namespace Database\Seeders;

use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tagging_tags')->truncate();
        $data = [
            ['name' => 'RPJMD'],
            ['name' => 'RKPD'],
            ['name' => 'KUA PPAS'],
            ['name' => 'PERJANJIAN KINERJA (PK)'],
            ['name' => 'PROGRAM DAN KEGIATAN'],
            ['name' => 'RUP'],
            ['name' => 'INFO PENGADAAN'],
            ['name' => 'KEBIJAKAN'],
            ['name' => 'RAPERDA APBD'],
            ['name' => 'APBD'],
            ['name' => 'RKA'],
            ['name' => 'DPA'],
            ['name' => 'KAK-TOR'],
            ['name' => 'LKJIP'],
            ['name' => 'LKPJ'],
            ['name' => 'LPPD'],
            ['name' => 'LRPBPD'],
            ['name' => 'LAK'],
            ['name' => 'LRA'],
            ['name' => 'NERACA'],
            ['name' => 'CALK'],
            ['name' => 'ASET & INVENTARIS'],
            ['name' => 'LKPD DAN OPINI BPK'],
            ['name' => 'BUMD'],
            ['name' => 'LELANG LPSE'],
            ['name' => 'LHKPN'],
            ['name' => 'CSR'],
            ['name' => 'INFORMASI KEJADIAN BENCANA'],
            ['name' => 'DAFTAR KEJADIAN BENCANA'],
            ['name' => 'PENGUMUMAN'],
            ['name' => 'INFORMASI GANGGUAN'],
            ['name' => 'INFORMASI HOAX'],
            ['name' => 'HASIL PENANGANAN PENGADUAN'],
            ['name' => 'KAJIAN DAN PENELITIAN'],
            ['name' => 'PENGAWASAN INTERNAL'],
            ['name' => 'REGULASI INFORMASI PUBLIK'],
            ['name' => 'LAPORAN LAYANAN INFORMASI DAERAH'],
            ['name' => 'PENYERTAAN MODAL'],
            ['name' => 'INVESTASI USAHA'],
        ];
        // Fungsi untuk mengubah nilai menjadi sentence case
        function toSentenceCase($string)
        {
            return ucwords(strtolower($string));
        }

        // Mengubah setiap nilai dalam array menjadi sentence case dan menambahkan slug
        foreach ($data as &$item) {
            $item['name'] = toSentenceCase($item['name']);
            $item['slug'] = Str::slug($item['name']);
        }
        Tag::insert($data);
    }
}
