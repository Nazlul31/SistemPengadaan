<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengadaanDetail extends Model
{
    use HasFactory;

    protected $table = 'pengadaan_detail';
    protected $fillable = ['pengadaan_id', 'barang_id', 'jumlah', 'harga_satuan'];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}