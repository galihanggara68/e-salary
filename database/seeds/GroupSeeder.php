<?php

use App\Groups;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Groups::create([
            "name" => "A1"
        ]);

        Groups::create([
            "name" => "A2"
        ]);
    }
}
