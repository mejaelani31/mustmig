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
        Schema::create('surat_pernyataans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->string('nama_pelanggan');
            $table->text('alamat_pelanggan')->nullable();
            $table->string('tarif_pelanggan');
            $table->unsignedInteger('daya_pelanggan');
            $table->date('tanggal_ttd')->nullable();
            $table->string('nama_ttd');
            $table->text('alamat_ttd')->nullable();
            $table->string('nik_ttd');
            $table->string('nohp_ttd');
            $table->string('file_ttd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pernyataans');
    }
};
