<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'telepon',
        'bidang_keahlian',
    ];

    // One lecturer teaches many courses
    public function mataKuliahs(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'dosen_id');
    }
}