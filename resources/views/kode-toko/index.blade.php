@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Master Kode Toko</h1>
            <div class="flex space-x-3">
                <a href="{{ route('kode-toko.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700 transition">
                    + Tambah Form
                </a>
                <form action="{{ route('kode-toko.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <input type="file" name="file" id="fileInput" class="hidden" accept=".xlsx,.xls,.csv">
                    <button type="button" id="btnUpload" class="bg-emerald-600 text-white px-4 py-2 rounded-xl shadow hover:bg-emerald-700 transition">
                        + Import Excel
                    </button>
                </form>
                <a href="{{ route('kode-toko.export-excel') }}" class="bg-teal-600 text-white px-4 py-2 rounded-xl shadow hover:bg-teal-700 transition">
                    Export Excel
                </a>
                <a href="{{ route('kode-toko.export-pdf') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-xl shadow hover:bg-indigo-700 transition">
                    Export PDF
                </a>
            </div>
        </div>

        {{-- Table Data --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Daftar Data</h2>
            </div>

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="py-3 px-4 rounded-tl-lg">Kode Toko Baru</th>
                        <th class="py-3 px-4">Kode Toko Lama</th>
                        <th class="py-3 px-4 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($data as $item)    
                        <tr>
                            <td class="py-3 px-4">{{$item->kode_toko_baru}}</td>
                            <td class="py-3 px-4">{{$item->kode_toko_lama}}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('kode-toko.show', $item->kode_toko_baru) }}" class="text-blue-600 hover:underline">Detail</a>
                                <a href="{{ route('kode-toko.edit', $item->kode_toko_baru) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('kode-toko.destroy', $item->kode_toko_baru) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('btnUpload');
    const fileInput = document.getElementById('fileInput');
    const form = document.getElementById('importForm');

    if (btn && fileInput && form) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Button clicked');
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            console.log('File selected:', fileInput.files.length);
            if(fileInput.files.length > 0) {
                console.log('Submitting form');
                form.submit();
            }
        });
    } else {
        console.error('Elements not found');
    }
});
</script>
@endsection
