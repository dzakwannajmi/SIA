<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKelasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_kelas'     => ['required', 'string', 'max:10', 'unique:kelas,kode_kelas,' . $this->kelas->id],
            'nama_kelas'     => ['required', 'string', 'max:100'],
            'tahun_angkatan' => ['required', 'digits:4', 'integer', 'min:2000', 'max:2099'],
        ];
    }
}