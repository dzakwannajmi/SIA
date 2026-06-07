<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')
                  ->constrained('mahasiswas')
                  ->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')
                  ->constrained('mata_kuliahs')
                  ->onDelete('cascade');
            $table->decimal('nilai_tugas', 5, 2)->default(0);
            $table->decimal('nilai_uts', 5, 2)->default(0);
            $table->decimal('nilai_uas', 5, 2)->default(0);

            // Tidak pakai storedAs — dihitung manual di Controller
            // SQLite & MySQL versi lama tidak support storedAs
            $table->decimal('nilai_akhir', 5, 2)->default(0);

            $table->string('grade', 2)->nullable();
            $table->unique(['mahasiswa_id', 'mata_kuliah_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};