<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Weecom',
            'email' => 'admin@mail.com',
            'password' => Hash::make("admin123"),
            'email_verified_at' => now(),
            'role_id' => 1
        ]);

        $user->assignRole('admin');
    }
}
