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
        if ($row[0] === 'kode_toko_baru') {
            return null;
        }

        return new KodeTokoModel([
            'kode_toko_baru'   => $row[0],
            'kode_toko_lama'   => $row[1],
        ]);
    }
}
