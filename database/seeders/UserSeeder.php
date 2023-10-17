<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => "Test Admin",
                'role_id' => 1,
                'email' => "test@admin.com",
                'password' => Hash::make(12345678)
            ]
        );

        User::create(
            [
                'name' => "Test User",
                'role_id' => 2,
                'email' => "test@user.com",
                'password' => Hash::make(12345678)
            ]
        );

        User::create(
            [
                'name' => "Test 1 User",
                'role_id' => 2,
                'email' => "test1@user.com",
                'password' => Hash::make(12345678)
            ]
        );
    }
}
