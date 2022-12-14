<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::truncate();
        Material::create([
            'name' => 'Butyl'
        ]);
        Material::create([
            'name' => 'Silicone'
        ]);
        Material::create([
            'name' => 'PTFE'
        ]);
        Material::create([
            'name' => 'Teflona'
        ]);
        Material::create([
            'name' => 'Rubber'
        ]);
    }
}
