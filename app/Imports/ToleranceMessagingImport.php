<?php

namespace App\Imports;

use App\Models\ToleranceMessaging;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ToleranceMessagingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ToleranceMessaging([
            'message' => $row['message']
        ]);
    }
}
