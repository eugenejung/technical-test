<?php

namespace App\Exports;

use App\Models\MasterSalesModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterSalesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterSalesModel::all();
    }
    public function headings(): array
    {
        return [
            'Kode Sales',
            'Nama Sales',
        ];
    }
}
