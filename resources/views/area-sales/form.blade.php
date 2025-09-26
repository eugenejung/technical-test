@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold mb-6">{{ isset($data) ? 'Edit Area Sales' : 'Tambah Area Sales' }}</h1>

        <form action="{{ isset($data) ? route('area-sales.update', $data->kode_toko) : route('area-sales.store') }}" method="POST">
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
                    <label class="w-48 font-semibold">Area Sales</label>
                    <div class="flex-1">
                        <input type="text" name="area_sales" 
                               value="{{ old('area_sales', isset($data) ? $data->area_sales : '') }}" 
                               class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
                        @error('area_sales')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('area-sales.index') }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded-xl shadow hover:bg-gray-700">
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