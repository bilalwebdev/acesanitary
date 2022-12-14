<?php

namespace Database\Seeders;

use App\Models\Regulations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegulationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regulations::create([
            'name' => 'FDA'
        ]);
        Regulations::create([
            'name' => '3-A'
        ]);
        Regulations::create([
            'name' => 'USP Class VI'
        ]);
        Regulations::create([
            'name' => 'Statice Conductive'
        ]);
        Regulations::create([
            'name' => 'Continuity/Grounded'
        ]);
    }
}
