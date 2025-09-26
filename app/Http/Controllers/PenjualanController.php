<?php

namespace App\Http\Controllers;

use App\Exports\PenjualanExport;
use App\Imports\PenjualanImport;
use App\Models\PenjualanModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenjualanController extends Controller
{
    public function index()
    {
        $data = PenjualanModel::all();
        return view('penjualan.index', compact('data'));
    }
    public function show($id)
    {
        $data = PenjualanModel::find($id);
        return view('penjualan.detail', compact('data'));
    }
    public function create()
    {
        return view('penjualan.form');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new PenjualanImport, $request->file('file'));

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil diimport dari Excel');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_toko'          => 'required',
            'nominal_transaksi'  => 'required|numeric|min:0',
        ]);

        PenjualanModel::create($validated);

        return redirect()->route('penjualan.index');
    }
    public function edit($id)
    {
        $data = PenjualanModel::find($id);
        
        if (!$data) {
            return redirect()->route('penjualan.index')->with('error', 'Data tidak ditemukan');
        }
        
        return view('penjualan.form', compact('data'));
    }
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'kode_toko'          => 'required',
            'nominal_transaksi'  => 'required|numeric|min:0',
        ]);

        $data = PenjualanModel::find($id);
        
        if (!$data) {
            return redirect()->route('penjualan.index')->with('error', 'Data tidak ditemukan');
        }

        $data->update($validated);

        return redirect()->route('penjualan.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $data = PenjualanModel::find($id);
        $data->delete();
        return redirect()->route('penjualan.index')->with('success', 'Data berhasil dihapus');
    }
    public function exportExcel()
    {
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }
    public function exportPdf()
    {
        $data = PenjualanModel::all();
        $pdf = Pdf::loadView('penjualan.export-pdf', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        
        $filename = 'Penjualan_' . date('Y-m-d_H-i-s') . '.pdf';
        
        return $pdf->download($filename);
    }
}
