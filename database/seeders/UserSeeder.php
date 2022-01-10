<?php

namespace Database\Seeders;

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
        \DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'image' => 'user.png',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'mobile' => '1234567890',
                'gender' => 'male',
                'address' => 'Barishal University',
                'DOB' => '2000-01-01',
                'role_id' => 1,
            ],
        ]);
    }
}
