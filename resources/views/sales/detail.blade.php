@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold mb-6">Detail Area Sales</h1>

        <div class="space-y-4">
            <div class="flex">
                <span class="w-48 font-semibold">Kode Toko</span>
                <span>: {{ $data->kode_toko }}</span>
            </div>
            <div class="flex">
                <span class="w-48 font-semibold">Area Sales</span>
                <span>: {{ $data->area_sales }}</span>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('area-sales.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-xl shadow hover:bg-gray-700">
               Kembali
            </a>
        </div>
    </div>
</div>
@endsection
