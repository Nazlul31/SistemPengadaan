@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Pengadaan</h1>
        <a href="{{ route('pengadaan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Tambah Pengadaan</a>
    </div>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nomor Pengadaan</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Vendor</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Total Harga</th>
                <th class="px-4 py-2">Aksi</th>
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
                    <td class="border px-4 py-2">
                        <a href="{{ route('pengadaan.show', $item) }}" class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('pengadaan.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('pengadaan.destroy', $item) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection