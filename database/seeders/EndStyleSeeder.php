<?php

namespace Database\Seeders;

use App\Models\EndStyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EndStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EndStyle::truncate();
        EndStyle::create([
            'model' => 'TC',
            'name' => 'SanitaryClamp',
            'part_number' => 'SL200R-TC',
            'size' => '2',
            'price' => '29.42',
            'step_up_supported' => 1,
            'image' => 'images/endstyles/placeholder.png'

        ]);
    }
}
