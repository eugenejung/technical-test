@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold mb-6">{{ isset($data) ? 'Edit Kode Toko' : 'Tambah Kode Toko' }}</h1>

        <form action="{{ isset($data) ? route('kode-toko.update', $data->kode_toko_baru) : route('kode-toko.store') }}" method="POST">
            @csrf
            @if(isset($data))
                @method('PUT')
            @endif

            <div class="space-y-4">
                <div class="flex items-center">
                    <label class="w-48 font-semibold">Kode Toko Lama</label>
                    <div class="flex-1">
                        <input type="text" name="kode_toko_lama" 
                               value="{{ old('kode_toko_lama', isset($data) ? $data->kode_toko_baru : '') }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300 bg-gray-100" 
                               readonly>
                    </div>
                </div>

                <div class="flex items-center">
                    <label class="w-48 font-semibold">Kode Toko Baru</label>
                    <div class="flex-1">
                        <input type="text" name="kode_toko_baru" 
                               value="{{ old('kode_toko_baru', isset($data) ? '' : '') }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300"
                               placeholder="{{ isset($data) ? 'Masukkan kode toko yang baru' : 'Masukkan kode toko' }}">
                        @error('kode_toko_baru')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('kode-toko.index') }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded-xl shadow hover:bg-gray-700">
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