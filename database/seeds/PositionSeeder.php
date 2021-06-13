<?php

use App\Positions;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Positions::create([
            "name" => "IT Support"
        ]);
    }
}
