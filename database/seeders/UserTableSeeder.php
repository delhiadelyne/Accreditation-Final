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
            'name' => 'RTB Admin',
            'email' => 'rtb@rtb.com',
            'role' => 'admin',
            'password' => bcrypt('rtb@rtb.com'),
        ]);

        User::create([
            'name' => 'Company ',
            'email' => 'company@rtb.com',
            'role' => 'institution',
            'password' => bcrypt('applicant@rtb.com'),
        ]);

        // User::create([
        //     'name' => 'Training Center',
        //     'email' => 'trainingcenter@rtb.com',
        //     'role' => 'company',
        //     'password' => bcrypt('trainingcenter@rtb.com'),
        // ]);

        User::create([
            'name' => 'Trainee',
            'email' => 'trainee@rtb.com',
            'role' => 'user',
            'password' => bcrypt('trainee@rtb.com'),
        ]);
    }
}
