<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->string('nama_pegawai', 255);
            $table->integer('nip');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tempat_tanggal_lahir', 255);
            $table->enum('hak_akses', ['user', 'penandatangan', 'reviewer']);
            $table->tinyInteger('aktivasi')->default(0); // 0 = nonaktif, 1 = aktif

            // Foreign keys
            $table->unsignedInteger('id_jabatan');
            $table->unsignedInteger('id_jabatangol');
            $table->unsignedInteger('id_unitkerja');

            // Relasi
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')->onDelete('cascade');
            $table->foreign('id_jabatangol')->references('id_jabatangol')->on('jabatangol')->onDelete('cascade');
            $table->foreign('id_unitkerja')->references('id_unitkerja')->on('unit_kerja')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
