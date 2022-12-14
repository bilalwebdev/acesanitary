<?php

namespace App\Imports;

use App\Models\Series;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SeriesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Series([
            'name' => $row['name'],
            'description' => $row['description'],
        ]);
    }
}
