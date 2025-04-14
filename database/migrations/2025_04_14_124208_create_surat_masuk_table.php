<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->increments('id_suratmasuk');

            $table->unsignedInteger('dari'); // dari satu jabatan (FK)
            $table->json('tembusan');        // array id_jabatan (JSON)

            $table->date('tanggal');
            $table->string('no_surat')->unique();

            $table->enum('sifat', ['penting', 'tidak penting']);

            $table->string('lampiran'); // path file PDF
            $table->text('perihal');

            $table->foreign('dari')->references('id_jabatan')->on('jabatan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
