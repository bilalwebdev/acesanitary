<?php

namespace App\Imports;

use App\Models\Media;
use Maatwebsite\Excel\Concerns\ToModel;
use  Maatwebsite\Excel\Concerns\WithHeadingRow;

class MediaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Media([
            'name' => $row['name'],
            'status' => $row['status'],
        ]);
    }
}
