<?php

namespace App\Http\Controllers;

use App\Exports\MasterSalesExport;
use App\Imports\MasterSalesImport;
use App\Models\MasterSalesModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MasterSalesController extends Controller
{
    public function index()
    {
        $data = MasterSalesModel::all();
        return view('sales.index', compact('data'));
    }
    public function show($id)
    {
        $data = MasterSalesModel::find($id);
        return view('sales.detail', compact('data'));
    }
    public function create()
    {
        return view('sales.form');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new MasterSalesImport, $request->file('file'));

        return redirect()->route('master-sales.index')->with('success', 'Data berhasil diimport dari Excel');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_sales' => 'required',
            'nama_sales' => 'required',
        ]);

        MasterSalesModel::create($validated);

        return redirect()->route('master-sales.index');
    }
    public function edit($id)
    {
        $data = MasterSalesModel::find($id);
        
        if (!$data) {
            return redirect()->route('master-sales.index')->with('error', 'Data tidak ditemukan');
        }
        
        return view('sales.form', compact('data'));
    }
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'kode_sales' => 'required',
            'nama_sales' => 'required',
        ]);

        $data = MasterSalesModel::find($id);
        
        if (!$data) {
            return redirect()->route('master-sales.index')->with('error', 'Data tidak ditemukan');
        }

        $data->update($validated);

        return redirect()->route('master-sales.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $data = MasterSalesModel::find($id);
        $data->delete();
        return redirect()->route('master-sales.index')->with('success', 'Data berhasil dihapus');
    }
    public function exportExcel()
    {
        return Excel::download(new MasterSalesExport, 'sales.xlsx');
    }
    public function exportPdf()
    {
        $data = MasterSalesModel::all();
        $pdf = Pdf::loadView('sales.export-pdf', compact('data'));
        $pdf->setPaper('A4', 'portrait');

        $filename = 'Master_Sales_' . date('Y-m-d_H-i-s') . '.pdf';

        return $pdf->download($filename);
    }
}
