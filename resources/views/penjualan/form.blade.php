@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold mb-6">{{ isset($data) ? 'Edit Penjualan' : 'Tambah Penjualan' }}</h1>

        <form action="{{ isset($data) ? route('penjualan.update', $data->kode_toko) : route('penjualan.store') }}" method="POST">
            @csrf
            @if(isset($data))
                @method('PUT')
            @endif
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <label class="w-48 font-semibold">Kode Toko</label>
                    <div class="flex-1">
                        <input type="text" name="kode_toko" 
                               value="{{ old('kode_toko', isset($data) ? $data->kode_toko : '') }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300"
                               {{ isset($data) ? 'readonly' : '' }}>
                        @error('kode_toko')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <label class="w-48 font-semibold">Nominal Transaksi</label>
                    <div class="flex-1">
                        <input type="number" step="0.01" name="nominal_transaksi" 
                               value="{{ old('nominal_transaksi', isset($data) ? $data->nominal_transaksi : '') }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
                        @error('nominal_transaksi')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('penjualan.index') }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded-xl shadow hover:bg-gray-700">
                   Batal
                </a> 
                &nbsp;
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl shadow hover:bg-blue-700">
                    {{ isset($data) ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection