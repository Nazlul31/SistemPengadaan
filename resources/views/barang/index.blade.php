@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Barang</h1>
        <a href="{{ route('barang.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Tambah Barang</a>
    </div>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Harga</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->nama }}</td>
                    <td class="border px-4 py-2">{{ $item->kategori }}</td>
                    <td class="border px-4 py-2">{{ number_format($item->harga, 2) }}</td>
                    <td class="border px-4 py-2">{{ $item->stok }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('barang.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('barang.destroy', $item) }}" method="POST" class="inline">
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