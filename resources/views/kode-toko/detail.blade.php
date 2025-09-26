@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold mb-6">Detail Kode Toko</h1>

        <div class="space-y-4">
            <div class="flex">
                <span class="w-48 font-semibold">Kode Toko Baru</span>
                <span>: {{ $data->kode_toko_baru }}</span>
            </div>
            <div class="flex">
                <span class="w-48 font-semibold">Kode Toko Lama</span>
                <span>: {{ $data->kode_toko_lama }}</span>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('kode-toko.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-xl shadow hover:bg-gray-700">
               Kembali
            </a>
        </div>
    </div>
</div>
@endsection
