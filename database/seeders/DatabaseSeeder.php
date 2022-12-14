<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(
            [
                AuthTableSeeder::class,
                SeriesSeeder::class,
                MaterialSeeder::class,
                MediaSeeder::class,
                HoseSeeder::class,
                EndStyleSeeder::class,
                AccessoriesSeeder::class,
                HoseAssemblySeeder::class,
                ModelSeeder::class,
                HoseSizeSeeder::class,
                ApplicationTypeSeeder::class,
                RegulationsSeeder::class,
                PriceListSeeder::class,
                SeriesMediaSeeder::class
            ]
        );

        Schema::enableForeignKeyConstraints();
    }
}
