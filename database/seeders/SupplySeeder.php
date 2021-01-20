<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supply')->insert([
            [
                'name' => 'mascarilla',
                'id_property' => '0987654323',
                'description' => 'example text',
                'amount' => 100
            ],
            [
                'name' => 'paracetamol',
                'id_property' => '0987654324',
                'description' => 'example text',
                'amount' => 100
            ],
            [
                'name' => 'vitamina C',
                'id_property' => '0987654325',
                'description' => 'example text',
                'amount' => 100
            ],
            [
                'name' => 'protectores',
                'id_property' => '0987654326',
                'description' => 'example text',
                'amount' => 100
            ]
        ]);
    }
}
