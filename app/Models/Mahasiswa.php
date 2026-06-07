<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'jenis_kelamin',
        'alamat',
        'telepon',
        'kelas_id',
    ];

    // Each student belongs to one class
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Each student has many grade records
    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class, 'mahasiswa_id');
    }
}