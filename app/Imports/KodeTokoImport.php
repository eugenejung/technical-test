<?php

namespace App\Imports;

use App\Models\KodeTokoModel;
use Maatwebsite\Excel\Concerns\ToModel;

class KodeTokoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KodeTokoModel([
            //
        ]);
    }
}
