<?php

use App\Employees;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employees::create([
            'user_id' => 1,
            'position_id' => 1,
            'name' => "Test Employee",
            'gender' => 1,
            'address' => "Test Alamat lengkap",
            'phone' => "080000",
            'email' => "mail@mail.com",
            'department_id' => 1,
            'group_id' => 1,
            'status' => 1,
            'salary' => 4000000
        ]);
    }
}
