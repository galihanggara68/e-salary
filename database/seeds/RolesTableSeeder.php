<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'director',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'hrd',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'finance',
            'guard_name' => 'web'
        ]);
    }
}
