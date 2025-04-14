<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->increments('id_jabatan');
            $table->string('nama_jabatan', 255);
            $table->tinyText('keterangan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jabatan');
    }
};
