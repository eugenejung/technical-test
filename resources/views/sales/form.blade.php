@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold mb-6">{{ isset($data) ? 'Edit Master Sales' : 'Tambah Master Sales' }}</h1>

        <form action="{{ isset($data) ? route('master-sales.update', $data->kode_sales) : route('master-sales.store') }}" method="POST">
            @csrf
            @if(isset($data))
                @method('PUT')
            @endif
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <label class="w-48 font-semibold">Kode Sales</label>
                    <div class="flex-1">
                        <input type="text" name="kode_sales" 
                               value="{{ old('kode_sales', isset($data) ? $data->kode_sales : '') }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300"
                               {{ isset($data) ? 'readonly' : '' }}>
                        @error('kode_sales')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <label class="w-48 font-semibold">Nama Sales</label>
                    <div class="flex-1">
                        <input type="text" name="nama_sales" 
                               value="{{ old('nama_sales', isset($data) ? $data->nama_sales : '') }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
                        @error('nama_sales')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('master-sales.index') }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded-xl shadow hover:bg-gray-700">
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