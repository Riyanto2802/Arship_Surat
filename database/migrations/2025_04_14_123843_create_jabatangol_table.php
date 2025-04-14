<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jabatangol', function (Blueprint $table) {
            $table->increments('id_jabatangol'); // Primary Key & Auto Increment
            $table->string('jabatan', 255); // Nama jabatan
            $table->string('golongan', 255); // Nama golongan
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jabatangol');
    }
};
