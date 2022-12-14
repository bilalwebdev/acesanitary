<?php

namespace Database\Seeders;

use App\Models\ApplicationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicationType::create([
            'name'=>'Pharma/Biotec'
        ]);
        ApplicationType::create([
            'name'=>'Food,Bev,&Dairy'
        ]);
    }
}
