<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OxigenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oxigen')->insert([
            [
                'id_property' => '0987654321',
                'description' => 'example text',
                'capacity' => '100',
                'amount' => 2
            ],
            [
                'id_property' => '0987654322',
                'description' => 'example text',
                'capacity' => '200',
                'amount' => 1
            ],
        ]);
    }
}
