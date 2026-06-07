<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kode_kelas',
        'nama_kelas',
        'tahun_angkatan',
    ];

    // One class has many students
    public function mahasiswas(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id');
    }
}