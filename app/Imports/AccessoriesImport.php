<?php

namespace App\Imports;

use App\Models\Accessories;
use Maatwebsite\Excel\Concerns\ToModel;
use  Maatwebsite\Excel\Concerns\WithHeadingRow;

class AccessoriesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Accessories([
            'part_number' => $row['part_number'],
            'size' => $row['size'],
            'category' => $row['category'],
            'price' => $row['price'],
        ]);

    }
}
