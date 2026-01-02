<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('umkm', function (Blueprint $table) {

            // 1. Tambah kolom RT dan RW
            $table->string('rt')->nullable()->after('alamat');
            $table->string('rw')->nullable()->after('rt');

            // 2. Hapus kolom rt_rw lama
            $table->dropColumn('rt_rw');

            // 3. Rename dan ubah nullable bahan baku
            $table->renameColumn('bahan_baku_utama', 'bahan_baku');
            $table->string('bahan_baku')->nullable()->change();

            // 4. Rename dan ubah nullable alat produksi
            $table->renameColumn('alat_produksi_utama', 'alat_produksi');
            $table->string('alat_produksi')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('umkm', function (Blueprint $table) {

            // Rollback rename dan nullable
            $table->renameColumn('bahan_baku', 'bahan_baku_utama');
            $table->string('bahan_baku_utama')->nullable(false)->change();

            $table->renameColumn('alat_produksi', 'alat_produksi_utama');
            $table->string('alat_produksi_utama')->nullable(false)->change();

            // Rollback hapus rt_rw
            $table->string('rt_rw')->after('alamat');

            // Hapus rt dan rw baru
            $table->dropColumn(['rt', 'rw']);
        });
    }
};
