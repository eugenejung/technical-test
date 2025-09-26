@extends('layout')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-bold mb-6">Detail Penjualan</h1>

        <div class="space-y-4">
            <div class="flex">
                <span class="w-48 font-semibold">Kode Toko</span>
                <span>: {{ $data->kode_toko }}</span>
            </div>
            <div class="flex">
                <span class="w-48 font-semibold">Nominal Transaksi</span>
                <span>: {{ number_format($data->nominal_transaksi, 2, ',', '.') }}</span>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('penjualan.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-xl shadow hover:bg-gray-700">
               Kembali
            </a>
        </div>
    </div>
</div>
@endsection
