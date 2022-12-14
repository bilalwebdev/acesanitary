<?php

namespace App\Imports;

use App\Models\Hose;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HoseImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Hose([
            'model'  => $row['model'],
            'part_number' => $row['part_number'],
            'name' => $row['name'],
            'series_id' => $row['series_id'],
            'material_id' => $row['material_id'],
            'inner_diameter' => $row['inner_diameter'],
            'outer_diameter' => $row['outer_diameter'],
            'app_type' => $row['app_type'],
            'min_temprature' => $row['min_temprature'],
            'max_temprature' => $row['max_temprature'],
            'deration' => $row['deration'],
            'max_supported_pressure' => $row['max_supported_pressure'],
            'working_pressure' => $row['working_pressure'],
            'price' => $row['price'],
            'full_coil_oal' => $row['full_coil_oal'],
            'description' => $row['description'],
            'factory_assembly' => $row['factory_assembly'],
            'unit_of_measure' => $row['unit_of_measure'],
            'image' => $row['image'],
            'requirments' => $row['requirments']
        ]);
    }
}
