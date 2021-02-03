<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class solictudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solicitud')->insert([
            [
                'namePerson' => 'Pepe',
                'id_property' => '0987654321',
                'description' => 'example text',
                'nameProduct' => '100',
                'amount' => 2
            ],
            [
                'namePerson' => 'Juan',
                'id_property' => '0987654322',
                'description' => 'example text',
                'nameProduct' => '100',
                'amount' => 1
            ],
        ]);
    }
}
