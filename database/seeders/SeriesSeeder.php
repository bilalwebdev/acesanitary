<?php

namespace Database\Seeders;

use App\Models\Series;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Series::truncate();
        Series::create([
            'name' => 'R-Series'
        ]);
        Series::create([
            'name' => 'S-Series'
        ]);
        Series::create([
            'name' => 'T-Series'
        ]);
        Series::create([
            'name' => 'F-Series'
        ]);
    }
}
