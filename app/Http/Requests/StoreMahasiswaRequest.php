<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nim'           => ['required', 'string', 'max:20', 'unique:mahasiswas,nim'],
            'nama'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:100', 'unique:mahasiswas,email'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'alamat'        => ['nullable', 'string', 'max:255'],
            'telepon'       => ['nullable', 'string', 'max:15'],
            'kelas_id'      => ['required', 'exists:kelas,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'jenis_kelamin.in' => 'Jenis kelamin harus L (Laki-laki) atau P (Perempuan).',
            'kelas_id.exists'  => 'Kelas yang dipilih tidak ditemukan.',
        ];
    }
}