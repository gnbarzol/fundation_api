<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Supply;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OxigenSeeder::class);
        $this->call(SupplySeeder::class);
    }
}
