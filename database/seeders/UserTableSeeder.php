<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('admin@admin.com'),
        ]);

        User::create([
            'name' => 'Institution',
            'email' => 'institution@institution.com',
            'role' => 'institution',
            'password' => bcrypt('institution@institution.com'),
        ]);

        User::create([
            'name' => 'Company',
            'email' => 'company@company.com',
            'role' => 'company',
            'password' => bcrypt('company@company.com'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'role' => 'user',
            'password' => bcrypt('user@user.com'),
        ]);
    }
}
