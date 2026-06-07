<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
        'grade',
    ];

    protected $casts = [
        'nilai_tugas'  => 'decimal:2',
        'nilai_uts'    => 'decimal:2',
        'nilai_uas'    => 'decimal:2',
        'nilai_akhir'  => 'decimal:2',
    ];

    // Grade belongs to one student
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    // Grade belongs to one course
    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    // Calculate final grade value (used if not using storedAs in migration)
    public function getNilaiAkhirAttribute(): float
    {
        return ($this->nilai_tugas * 0.30)
             + ($this->nilai_uts   * 0.35)
             + ($this->nilai_uas   * 0.35);
    }

    // Determine letter grade from final value
    public static function calculateGrade(float $nilaiAkhir): string
    {
        return match(true) {
            $nilaiAkhir >= 85 => 'A',
            $nilaiAkhir >= 70 => 'B',
            $nilaiAkhir >= 55 => 'C',
            $nilaiAkhir >= 40 => 'D',
            default           => 'E',
        };
    }
}