<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('umkm', function (Blueprint $table) {
        $table->id();
        $table->string('nama_umkm');
        $table->string('nama_pemilik');
        $table->string('alamat');
        $table->string('rt_rw');
        $table->string('kelurahan');
        $table->string('kecamatan');
        $table->foreignId('kategori_id')->constrained('kategori_umkm')->onDelete('cascade');
        $table->text('deskripsi')->nullable();
        $table->string('bahan_baku_utama');
        $table->string('alat_produksi_utama');

        $table->decimal('latitude', 10, 7)->nullable();
        $table->decimal('longitude', 10, 7)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
