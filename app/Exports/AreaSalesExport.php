<?php

namespace App\Exports;

use App\Models\AreaSalesModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AreaSalesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AreaSalesModel::all();
    }
    public function headings(): array
    {
        return [
            'Kode Toko',
            'Area Sales',
        ];
    }
}
