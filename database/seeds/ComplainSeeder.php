<?php

use App\Complain;
use Illuminate\Database\Seeder;

class ComplainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complain::create([
            "employee_id" => 1,
            "complain" => "Gaji saya kurang 400rb"
        ]);
    }
}
