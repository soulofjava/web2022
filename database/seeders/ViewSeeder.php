<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("drop view if exists datappid");
        DB::statement("create view datappid as select 'menu' as tipe, menu_url, kategori, menu_name from front_menus where kategori is not null and active = 1 union all select 'news' as tipe, slug, kategori, title as menu_name from news where kategori is not null and terbit = 1;");
    }
}
