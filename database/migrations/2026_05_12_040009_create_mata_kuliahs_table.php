<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mk', 10)->unique();
            $table->string('nama_mk', 100);
            $table->unsignedTinyInteger('sks');
            $table->string('semester', 20);
            $table->foreignId('dosen_id')
                  ->constrained('dosens')
                  ->onDelete('restrict'); // Prevent delete if mata kuliah still exists
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};