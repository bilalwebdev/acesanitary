<?php

namespace Database\Seeders;

use App\Models\Hose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hose::truncate();
        for ($i = 0; $i < 5; $i++) {
            Hose::create([
                'model' => 'RES',
                'name' => 'RES' . $i . '50',
                'part_number' => 'RES' . $i . '50',
                'series_id' => 1,
                'material_id' => 1,
                'inner_diameter' => '1',
                'app_type' => 'Pharma/Biotec',
                'min_cleaning_temprature' => '1',
                'max_cleaning_temprature' => '2',
                'min_process_temprature' => '1',
                'max_process_temprature' => '2',
                'min_cleaning_pressure' => '1',
                'max_cleaning_pressure' => '2',
                'min_process_pressure' => '1',
                'max_process_pressure' => '2',
                'deration' => '68',
                'image' => 'images/placeholder.png',
                'price' => '300',
                'unit_of_measure' => 'FT',
                'full_coil_oal' => 200,
                'requirments' => json_encode(['grounding']),
                'factory_assembly' => 0,
                'description' => '1" BLUE PREMIUM SUCTION & DISCHARGE',
                'end_style_1' => json_encode(['SL200R-TC']),
                'end_style_2' => json_encode(['SL200R-TC']),
                'collar_id' => 1,
                'connection_size_1' => json_encode(['1']),
                'connection_size_2' => json_encode(['2']),
                'max_length' => '120',
                'regulations' => json_encode(['FDA']),

            ]);
        }
        for ($i = 2; $i < 4; $i++) {
            Hose::create([
                'model' => 'FDF',
                'name' => 'FDF' . $i . '00',
                'part_number' => 'FDF' . $i . '00',
                'series_id' => 4,
                'material_id' => 5,
                'inner_diameter' => '1',
                'app_type' => 'Pharma/Biotec',
                'min_cleaning_temprature' => '1',
                'max_cleaning_temprature' => '2',
                'min_process_temprature' => '1',
                'max_process_temprature' => '2',
                'min_cleaning_pressure' => '1',
                'max_cleaning_pressure' => '2',
                'min_process_pressure' => '1',
                'max_process_pressure' => '2',
                'deration' => '68',
                'image' => 'images/placeholder.png',
                'price' => '300',
                'unit_of_measure' => 'FT',
                'full_coil_oal' => 200,
                'requirments' => json_encode(['grounding']),
                'factory_assembly' => 0,
                'description' => '1" BLUE PREMIUM SUCTION & DISCHARGE',
                'end_style_1' => json_encode(['SL200R-TC']),
                'end_style_2' => json_encode(['SL200R-TC']),
                'collar_id' => 1,
                'connection_size_1' => json_encode(['1']),
                'connection_size_2' => json_encode(['2']),
                'max_length' => '120',
                'regulations' => json_encode(['FDA']),

            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Hose::create([
                'model' => 'TSC',
                'name' => 'TSC' . $i . '50',
                'part_number' => 'TSC' . $i . '50',
                'series_id' => 3,
                'material_id' => 3,
                'inner_diameter' => '1',
                'app_type' => 'Pharma/Biotec',
                'min_cleaning_temprature' => '1',
                'max_cleaning_temprature' => '2',
                'min_process_temprature' => '1',
                'max_process_temprature' => '2',
                'min_cleaning_pressure' => '1',
                'max_cleaning_pressure' => '2',
                'min_process_pressure' => '1',
                'max_process_pressure' => '2',
                'deration' => '68',
                'image' => 'images/placeholder.png',
                'price' => '300',
                'unit_of_measure' => 'FT',
                'full_coil_oal' => 200,
                'requirments' => json_encode(['grounding']),
                'factory_assembly' => 0,
                'description' => '1" BLUE PREMIUM SUCTION & DISCHARGE',
                'end_style_1' => json_encode(['SL200R-TC']),
                'end_style_2' => json_encode(['SL200R-TC']),
                'collar_id' => 1,
                'connection_size_1' => json_encode(['1']),
                'connection_size_2' => json_encode(['2']),
                'max_length' => '120',
                'regulations' => json_encode(['FDA']),

            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            Hose::create([
                'model' => 'SSD',
                'name' => 'SSD' . $i . '50',
                'part_number' => 'SSD' . $i . '50',
                'series_id' => 2,
                'material_id' => 2,
                'inner_diameter' => '1',
                'app_type' => 'Pharma/Biotec',
                'min_cleaning_temprature' => '1',
                'max_cleaning_temprature' => '2',
                'min_process_temprature' => '1',
                'max_process_temprature' => '2',
                'min_cleaning_pressure' => '1',
                'max_cleaning_pressure' => '2',
                'min_process_pressure' => '1',
                'max_process_pressure' => '2',
                'deration' => '68',
                'image' => 'images/placeholder.png',
                'price' => '300',
                'unit_of_measure' => 'FT',
                'full_coil_oal' => 200,
                'requirments' => json_encode(['grounding']),
                'factory_assembly' => 0,
                'description' => '1" BLUE PREMIUM SUCTION & DISCHARGE',
                'end_style_1' => json_encode(['SL200R-TC']),
                'end_style_2' => json_encode(['SL200R-TC']),
                'collar_id' => 1,
                'connection_size_1' => json_encode(['1']),
                'connection_size_2' => json_encode(['2']),
                'max_length' => '120',
                'regulations' => json_encode(['FDA']),

            ]);
        }
    }
}
