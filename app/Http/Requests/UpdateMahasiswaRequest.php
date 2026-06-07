<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nim'           => ['required', 'string', 'max:20', 'unique:mahasiswas,nim,' . $this->mahasiswa->id],
            'nama'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:100', 'unique:mahasiswas,email,' . $this->mahasiswa->id],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'alamat'        => ['nullable', 'string', 'max:255'],
            'telepon'       => ['nullable', 'string', 'max:15'],
            'kelas_id'      => ['required', 'exists:kelas,id'],
        ];
    }
}