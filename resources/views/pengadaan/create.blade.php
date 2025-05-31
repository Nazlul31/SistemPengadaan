@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Tambah Pengadaan</h1>
    <form action="{{ route('pengadaan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nomor_pengadaan" class="block text-sm font-medium text-gray-700">Nomor Pengadaan</label>
            <input type="text" name="nomor_pengadaan" id="nomor_pengadaan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="vendor_id" class="block text-sm font-medium text-gray-700">Vendor</label>
            <select name="vendor_id" id="vendor_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @foreach ($vendor as $v)
                    <option value="{{ $v->id }}">{{ $v->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="pending">Pending</option>
                <option value="disetujui">Disetujui</option>
                <option value="selesai">Selesai</option>
                <option value="batal">Batal</option>
            </select>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-semibold">Detail Barang</h2>
            <div id="barang-list">
                <div class="barang-item mb-4">
                    <label for="barang_id[]" class="block text-sm font-medium text-gray-700">Barang</label>
                    <select name="barang_id[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @foreach ($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama }}</option>
                        @endforeach
                    </select>
                    <label for="jumlah[]" class="block text-sm font-medium text-gray-700 mt-2">Jumlah</label>
                    <input type="number" name="jumlah[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <label for="harga_satuan[]" class="block text-sm font-medium text-gray-700 mt-2">Harga Satuan</label>
                    <input type="number" name="harga_satuan[]" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
            </div>
            <button type="button" onclick="addBarang()" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">Tambah Barang</button>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
    </form>
</div>

<script>
function addBarang() {
    const barangList = document.getElementById('barang-list');
    const barangItem = document.createElement('div');
    barangItem.classList.add('barang-item', 'mb-4');
    barangItem.innerHTML = `
        <label for="barang_id[]" class="block text-sm font-medium text-gray-700">Barang</label>
        <select name="barang_id[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @foreach ($barang as $b)
                <option value="{{ $b->id }}">{{ $b->nama }}</option>
            @endforeach
        </select>
        <label for="jumlah[]" class="block text-sm font-medium text-gray-700 mt-2">Jumlah</label>
        <input type="number" name="jumlah[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        <label for="harga_satuan[]" class="block text-sm font-medium text-gray-700 mt-2">Harga Satuan</label>
        <input type="number" name="harga_satuan[]" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    `;
    barangList.appendChild(barangItem);
}
</script>
@endsection