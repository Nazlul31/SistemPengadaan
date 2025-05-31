<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Vendor;
use App\Models\Barang;
use App\Models\PengadaanDetail;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index()
    {
        $pengadaan = Pengadaan::with('vendor')->get();
        return view('pengadaan.index', compact('pengadaan'));
    }

    public function create()
    {
        $vendor = Vendor::all();
        $barang = Barang::all();
        return view('pengadaan.create', compact('vendor', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_pengadaan' => 'required|string|unique:pengadaan,nomor_pengadaan',
            'tanggal' => 'required|date',
            'vendor_id' => 'required|exists:vendor,id',
            'status' => 'required|in:pending,disetujui,selesai,batal',
            'barang_id' => 'required|array',
            'barang_id.*' => 'exists:barang,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
            'harga_satuan' => 'required|array',
            'harga_satuan.*' => 'numeric|min:0',
        ]);

        $totalHarga = 0;
        foreach ($request->jumlah as $index => $jumlah) {
            $totalHarga += $jumlah * $request->harga_satuan[$index];
        }

        $pengadaan = Pengadaan::create([
            'nomor_pengadaan' => $request->nomor_pengadaan,
            'tanggal' => $request->tanggal,
            'vendor_id' => $request->vendor_id,
            'status' => $request->status,
            'total_harga' => $totalHarga,
        ]);

        foreach ($request->barang_id as $index => $barangId) {
            PengadaanDetail::create([
                'pengadaan_id' => $pengadaan->id,
                'barang_id' => $barangId,
                'jumlah' => $request->jumlah[$index],
                'harga_satuan' => $request->harga_satuan[$index],
            ]);
        }

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan.');
    }

    public function show(Pengadaan $pengadaan)
    {
        $pengadaan->load('vendor', 'details.barang');
        return view('pengadaan.show', compact('pengadaan'));
    }

    public function edit(Pengadaan $pengadaan)
    {
        $vendor = Vendor::all();
        $barang = Barang::all();
        $pengadaan->load('details');
        return view('pengadaan.edit', compact('pengadaan', 'vendor', 'barang'));
    }

    public function update(Request $request, Pengadaan $pengadaan)
    {
        $request->validate([
            'nomor_pengadaan' => 'required|string|unique:pengadaan,nomor_pengadaan,'.$pengadaan->id,
            'tanggal' => 'required|date',
            'vendor_id' => 'required|exists:vendor,id',
            'status' => 'required|in:pending,disetujui,selesai,batal',
            'barang_id' => 'required|array',
            'barang_id.*' => 'exists:barang,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
            'harga_satuan' => 'required|array',
            'harga_satuan.*' => 'numeric|min:0',
        ]);

        $totalHarga = 0;
        foreach ($request->jumlah as $index => $jumlah) {
            $totalHarga += $jumlah * $request->harga_satuan[$index];
        }

        $pengadaan->update([
            'nomor_pengadaan' => $request->nomor_pengadaan,
            'tanggal' => $request->tanggal,
            'vendor_id' => $request->vendor_id,
            'status' => $request->status,
            'total_harga' => $totalHarga,
        ]);

        $pengadaan->details()->delete();
        foreach ($request->barang_id as $index => $barangId) {
            PengadaanDetail::create([
                'pengadaan_id' => $pengadaan->id,
                'barang_id' => $barangId,
                'jumlah' => $request->jumlah[$index],
                'harga_satuan' => $request->harga_satuan[$index],
            ]);
        }

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil diperbarui.');
    }

    public function destroy(Pengadaan $pengadaan)
    {
        $pengadaan->delete();
        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil dihapus.');
    }
}