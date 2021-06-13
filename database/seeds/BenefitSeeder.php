<?php

use App\Benefits;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Benefits::create([
            "group_id" => 1,
            "name" => "BPJS KS",
            "amount" => 400000
        ]);

        Benefits::create([
            "group_id" => 1,
            "name" => "Transport",
            "amount" => 50000
        ]);

        Benefits::create([
            "group_id" => 2,
            "name" => "Transport",
            "amount" => 25000
        ]);
    }
}
