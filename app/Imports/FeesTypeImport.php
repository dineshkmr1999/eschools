<?php

namespace App\Imports;

use App\Models\FeesType;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FeesTypeImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FeesType([
            'name' => $row["name"],
            'description' => $row["description"],
            'choiceable' => $row["choiceable"],
        ]);
    }
}
