<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKelasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_kelas'     => ['required', 'string', 'max:10', 'unique:kelas,kode_kelas'],
            'nama_kelas'     => ['required', 'string', 'max:100'],
            'tahun_angkatan' => ['required', 'digits:4', 'integer', 'min:2000', 'max:2099'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode_kelas.unique'         => 'Kode kelas sudah digunakan.',
            'tahun_angkatan.digits'     => 'Tahun angkatan harus 4 digit.',
        ];
    }
}