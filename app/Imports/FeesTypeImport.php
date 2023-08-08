<?php

namespace App\Imports;

use App\Models\FeesType;
use Maatwebsite\Excel\Concerns\ToModel;

class FeesTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FeesType([
            'name' => $row[0],
            'description' => $row[1],
            'choiceable' => $row[2],
        ]);
    }
}
