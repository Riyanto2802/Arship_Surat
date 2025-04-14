<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jabatangol', function (Blueprint $table) {
            $table->increments('id_jabatangol'); // INT & AUTO_INCREMENT & PRIMARY KEY
            $table->string('jabatan', 255);
            $table->string('golongan', 255);
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('jabatangol');
    }
};
