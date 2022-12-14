<?php

namespace Database\Seeders;

use App\Models\Accessories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accessories::truncate();
        Accessories::create([
            'part_number' => 'SL200R-HFC',
            'size' => 2,
            'price' => '29.42',
            'category' => 'Collar',
        ]);
    }
}
