<?php

namespace App\Exports;

use App\Models\KodeTokoModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class KodeTokoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KodeTokoModel::all();
    }
}
