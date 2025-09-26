<?php

namespace App\Http\Controllers;

use App\Exports\KodeTokoExport;
use App\Imports\KodeTokoImport;
use App\Models\KodeTokoModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KodeTokoController extends Controller
{
    public function index()
    {
        $data = KodeTokoModel::all();
        return view('kode-toko.index', compact('data'));
    }
    public function show($id)
    {
        $data = KodeTokoModel::find($id);
        return view('kode-toko.detail', compact('data'));
    }
    public function create()
    {
        return view('kode-toko.form');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new KodeTokoImport, $request->file('file'));

        return redirect()->route('kode-toko.index')->with('success', 'Data berhasil diimport dari Excel');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_toko_baru' => 'required',
            'kode_toko_lama' => 'nullable',
        ]);

        $validated = $request->only(['kode_toko_baru', 'kode_toko_lama']);

        KodeTokoModel::create($validated);

        return redirect()->route('kode-toko.index');
    }
    public function edit($id)
    {
        $data = KodeTokoModel::find($id);
        
        if (!$data) {
            return redirect()->route('kode-toko.index')->with('error', 'Data tidak ditemukan');
        }
        
        return view('kode-toko.form', compact('data'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'kode_toko_baru' => 'required',
        ]);

        $data = KodeTokoModel::find($id);
        
        if (!$data) {
            return redirect()->route('kode-toko.index')->with('error', 'Data tidak ditemukan');
        }

        $kode_toko_baru_lama = $data->kode_toko_baru;
        if ($request->kode_toko_baru != $kode_toko_baru_lama) {
            $data->delete();
            
            KodeTokoModel::create([
                'kode_toko_baru' => $request->kode_toko_baru,
                'kode_toko_lama' => $kode_toko_baru_lama,
            ]);
        } else {
            $data->update([
                'kode_toko_lama' => $kode_toko_baru_lama,
            ]);
        }

        return redirect()->route('kode-toko.index')->with('success', 'Data berhasil diupdate');
    }
    public function destroy($id)
    {
        $data = KodeTokoModel::find($id);
        $data->delete();
        return redirect()->route('kode-toko.index')->with('success', 'Data berhasil dihapus');
    }
    public function exportExcel()
    {
        return Excel::download(new KodeTokoExport, 'kode-toko.xlsx');
    }
    public function exportPdf()
    {
        $data = KodeTokoModel::all();
        $pdf = Pdf::loadView('kode-toko.export-pdf', compact('data'));
        $pdf->setPaper('A4', 'portrait');

        $filename = 'Kode_Toko_' . date('Y-m-d_H-i-s') . '.pdf';

        return $pdf->download($filename);
    }
}
