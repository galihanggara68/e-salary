<?php

use App\Departments;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departments::create([
            "name" => "Support",
            "status" => 1
        ]);
    }
}
