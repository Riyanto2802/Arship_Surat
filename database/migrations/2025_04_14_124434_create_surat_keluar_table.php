<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->increments('id_suratkeluar');

            // Tujuan dan tembusan bisa menyimpan banyak id_jabatan (dalam bentuk array json)
            $table->json('tujuan_suratkeluar'); // array id_jabatan
            $table->unsignedInteger('dari'); // FK ke id_jabatan
            $table->json('tembusan'); // array id_jabatan

            $table->date('tanggal');

            $table->string('no_surat')->unique(); // format seperti surat masuk
            $table->enum('sifat', ['penting', 'tidak penting']);

            $table->string('lampiran', 255); // path atau nama file
            $table->integer('perihal'); // bisa diganti ke FK kalau relasi
            $table->integer('isi_surat'); // bisa diganti ke FK kalau relasi

            $table->foreign('dari')->references('id_jabatan')->on('jabatan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
