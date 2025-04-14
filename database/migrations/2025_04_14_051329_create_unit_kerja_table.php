<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->increments('id_unitkerja'); // INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nama_unitkerja', 255); // VARCHAR(255)
            $table->string('kode_unitkerja', 255); // VARCHAR(255)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unit_kerja');
    }
};
