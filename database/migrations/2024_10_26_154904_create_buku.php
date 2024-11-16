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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('pengarang');
            $table->string('judul');
            $table->string('kode_penerbit');
            $table->string('kode_genre');
            $table->integer('tahun_terbit');
            $table->text('sinopsis');
            $table->integer('halaman');
            $table->string('ebook')->nullable();
            $table->string('kode_fakultas')->nullable();
            $table->string('status');
            $table->string('kode_sumber');
            $table->string('cover');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
