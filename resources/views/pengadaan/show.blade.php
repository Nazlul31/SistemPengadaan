@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Detail Pengadaan</h1>
    <div class="mb-4">
        <p><strong>Nomor Pengadaan:</strong> {{ $pengadaan->nomor_pengadaan }}</p>
        <p><strong>Tanggal:</strong> {{ $pengadaan->tanggal }}</p>
        <p><strong>Vendor:</strong> {{ $pengadaan->vendor->nama }}</p>
        <p><strong>Status:</strong> {{ $pengadaan->status }}</p>
        <p><strong>Total Harga:</strong> {{ number_format($pengadaan->total_harga, 2) }}</p>
    </div>
    <h2 class="text-lg font-semibold mb-2">Detail Barang</h2>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Barang</th>
                <th class="px-4 py-2">Jumlah</th>
                <th class="px-4 py-2">Harga Satuan</th>
                <th class="px-4 py-2">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengadaan->details as $detail)
                <tr>
                    <td class="border px-4 py-2">{{ $detail->barang->nama }}</td>
                    <td class="border px-4 py-2">{{ $detail->jumlah }}</td>
                    <td class="border px-4 py-2">{{ number_format($detail->harga_satuan, 2) }}</td>
                    <td class="border px-4 py-2">{{ number_format($detail->jumlah * $detail->harga_satuan, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('pengadaan.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Kembali</a>
</div>
@endsection