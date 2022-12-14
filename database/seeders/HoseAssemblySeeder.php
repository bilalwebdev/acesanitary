<?php

namespace Database\Seeders;

use App\Models\HoseAssembly;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoseAssemblySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HoseAssembly::truncate();
        HoseAssembly::create([
            'hose_id' => 1,
            'model' => 'RES100',
            'collar_id' => 1,
            'min_length' => '2',
            'max_length' => '6',
            'end_style_1' => json_encode(["SL200R - TC"]),
            'end_style_2' => json_encode(["SL200R - TC"]),
            'connection_size_1' => json_encode(["2", "3"]),
            'connection_size_2' => json_encode(["4", "6"]),
        ]);
    }
}
