<?php

namespace Database\Seeders;

use App\Models\HoseSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoseSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HoseSize::truncate();
        $seederData = [

            ['size' => '1/4'],
            ['size' => '3/8'],
            ['size' => '1/2'],
            ['size' => '3/4'],
            ['size' => '1'],
            ['size' => '1-1/2'],
            ['size' => '2'],
            ['size' => '2-1/2'],
            ['size' => '3'],
            ['size' => '4'],
            ['size' => '6'],

        ];

        HoseSize::insert($seederData);
    }
}
