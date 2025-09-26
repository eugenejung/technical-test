<?php

namespace App\Http\Controllers;

use App\Exports\AreaSalesExport;
use App\Imports\AreaSalesImport;
use App\Models\AreaSalesModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AreaSalesController extends Controller
{
    public function index()
    {
        $data = AreaSalesModel::all();
        return view('area-sales.index', compact('data'));
    }
    public function show($id)
    {
        $data = AreaSalesModel::find($id);
        return view('area-sales.detail', compact('data'));
    }
    public function create()
    {
        return view('area-sales.form');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new AreaSalesImport, $request->file('file'));

        return redirect()->route('area-sales.index')->with('success', 'Data berhasil diimport dari Excel');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_toko' => 'required',
            'area_sales' => 'required',
        ]);

        AreaSalesModel::create($validated);

        return redirect()->route('area-sales.index');
    }
    public function edit($id)
    {
        $data = AreaSalesModel::find($id);
        
        if (!$data) {
            return redirect()->route('area-sales.index')->with('error', 'Data tidak ditemukan');
        }
        
        return view('area-sales.form', compact('data'));
    }
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'kode_toko' => 'required',
            'area_sales' => 'required',
        ]);

        $data = AreaSalesModel::find($id);
        
        if (!$data) {
            return redirect()->route('area-sales.index')->with('error', 'Data tidak ditemukan');
        }

        $data->update($validated);

        return redirect()->route('area-sales.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $data = AreaSalesModel::find($id);
        $data->delete();
        return redirect()->route('area-sales.index')->with('success', 'Data berhasil dihapus');
    }
    public function exportExcel()
    {
        return Excel::download(new AreaSalesExport, 'area-sales.xlsx');
    }
    public function exportPdf()
    {
        $data = AreaSalesModel::all();
        $pdf = Pdf::loadView('area-sales.export-pdf', compact('data'));
        $pdf->setPaper('A4', 'portrait');

        $filename = 'Area_Sales_' . date('Y-m-d_H-i-s') . '.pdf';

        return $pdf->download($filename);
    }
}
