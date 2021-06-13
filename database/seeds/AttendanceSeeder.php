<?php

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $t = 1; $i < 44; $i++) {
            Attendance::create([
                "employee_id" => 1,
                "description" => "",
                "time" => Carbon::create(2021, 05, ($i % 2 == 1 ? $t++ : $t), ($i % 2 == 0 ? 8 : 17), mt_rand(20, 40), 0, "Asia/Jakarta")
            ]);
        }
    }
}
