<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjam_tempats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jkel');
            $table->string('usia');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('instansi');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('kegiatan');
            $table->string('acara');
            $table->string('jumlah');
            $table->string('kontak');
            $table->string('surat');
            $table->integer('status')->default(0);
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_tempats');
    }
};
