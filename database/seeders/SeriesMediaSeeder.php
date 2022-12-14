<?php

namespace Database\Seeders;

use App\Models\SeriesMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeriesMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeriesMedia::truncate();
        SeriesMedia::create([
            'media_id' => 1,
            'series_id' => 1,
            'hoseMaterial' => 'Butyl',
            'compatibility' => '-'
        ]);
        SeriesMedia::create([
            'media_id' => 2,
            'series_id' => 1,
            'hoseMaterial' => 'Butyl',
            'compatibility' => 'A'
        ]);
        SeriesMedia::create([
            'media_id' => 3,
            'series_id' => 1,
            'hoseMaterial' => 'Butyl',
            'compatibility' => 'B'
        ]);
        SeriesMedia::create([
            'media_id' => 1,
            'series_id' => 3,
            'hoseMaterial' => 'PTFE',
            'compatibility' => 'A'
        ]);
        SeriesMedia::create([
            'media_id' => 2,
            'series_id' => 3,
            'hoseMaterial' => 'PTFE',
            'compatibility' => 'A'
        ]);
        SeriesMedia::create([
            'media_id' => 5,
            'series_id' => 3,
            'hoseMaterial' => 'PTFE',
            'compatibility' => 'B'
        ]);
        SeriesMedia::create([
            'media_id' => 1,
            'series_id' => 4,
            'hoseMaterial' => 'Rubber',
            'compatibility' => 'X'
        ]);
        SeriesMedia::create([
            'media_id' => 2,
            'series_id' => 4,
            'hoseMaterial' => 'Rubber',
            'compatibility' => 'A'
        ]);
        SeriesMedia::create([
            'media_id' => 5,
            'series_id' => 4,
            'hoseMaterial' => 'Rubber',
            'compatibility' => 'B'
        ]);
    }
}
