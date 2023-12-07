<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create(
            [
                'name' => 'superadmin',
                'email' => 'malika@app.com',
                'password' => bcrypt('password'),
            ]
        );

        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
        
        $user = User::create([
            'name' => 'user',
            'email' => 'user@app.com',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('user');
    }
}
