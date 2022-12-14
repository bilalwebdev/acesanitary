<?php

namespace Database\Seeders;

use App\Models\Models;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Models::truncate();
        Models::create(
            ['name' => 'RES']
        );
        Models::create(
            ['name' => 'RSD']
        );
        Models::create(
            ['name' => 'SSD']
        );
        Models::create(
            ['name' => 'TSC']
        );
        Models::create(
            ['name' => 'FDF']
        );
    }
}
