<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::truncate();
        Media::create([
            'name' => 'Acetic Acid',
            'status' => 1,
        ]);
        Media::create([
            'name' => 'Acetaldehyde',
            'status' => 1,
        ]);
        Media::create([
            'name' => 'Acetamide',
            'status' => 1,
        ]);
        Media::create([
            'name' => 'Acetate Solvent',
            'status' => 1,
        ]);
        Media::create([
            'name' => 'Acetone',
            'status' => 1,
        ]);
        Media::create([
            'name' => 'Benzyl',
            'status' => 1,
        ]);
    }
}
