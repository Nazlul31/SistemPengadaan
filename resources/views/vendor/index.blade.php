@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Vendor</h1>
        <a href="{{ route('vendor.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Tambah Vendor</a>
    </div>
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Kontak</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendor as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->nama }}</td>
                    <td class="border px-4 py-2">{{ $item->kontak }}</td>
                    <td class="border px-4 py-2">{{ $item->alamat }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('vendor.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('vendor.destroy', $item) }}" method="POST" class="inline">
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