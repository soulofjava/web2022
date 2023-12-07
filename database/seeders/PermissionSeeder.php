<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'satpolpp',
                'guard_name' => 'web'
            ],
            [
                'name' => 'puskesmas-sukoharjo-1',
                'guard_name' => 'web'
            ]
        ];

        foreach ($data as $datum) {
            Permission::create($datum);
        }
    }
}
