<?php

namespace App\Imports;

use App\Models\campain;
use Maatwebsite\Excel\Concerns\ToModel;
use Hash;

class CampainsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new campain([
            'discount_code' => $row[0],
        ]);
    }
}
