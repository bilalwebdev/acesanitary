<?php

namespace App\Imports;

use App\Models\EndStyle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EndStyleImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EndStyle([
            'name'  => $row['name'],
            'model'  => $row['model'],
            'part_number'  => $row['part_number'],
            'size'  => $row['size'],
            'step_up_supported'  => $row['step_up_supported'],
            'price'  => $row['price'],
            'image' => $row['image'],
        ]);
    }
}
