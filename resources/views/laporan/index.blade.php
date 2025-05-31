@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Laporan Pengadaan</h1>
    <form action="{{ route('laporan.index') }}" method="GET" class="mb-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Semua</option>
                    <option value="pending">Pending</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="selesai">Selesai</option>
                    <option value="batal">Batal</option>
                </select>
            </div>
        </div>
        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Filter</button>
    </form>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nomor Pengadaan</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Vendor</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengadaan as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->nomor_pengadaan }}</td>
                    <td class="border px-4 py-2">{{ $item->tanggal }}</td>
                    <td class="border px-4 py-2">{{ $item->vendor->nama }}</td>
                    <td class="border px-4 py-2">{{ $item->status }}</td>
                    <td class="border px-4 py-2">{{ number_format($item->total_harga, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection