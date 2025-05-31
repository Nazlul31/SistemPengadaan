<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pengadaan')->unique();
            $table->date('tanggal');
            $table->foreignId('vendor_id')->constrained('vendor')->onDelete('cascade');
            $table->enum('status', ['pending', 'disetujui', 'selesai', 'batal']);
            $table->decimal('total_harga', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengadaan');
    }
};