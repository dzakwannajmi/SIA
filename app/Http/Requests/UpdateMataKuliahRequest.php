<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMataKuliahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_mk'   => ['required', 'string', 'max:10', 'unique:mata_kuliahs,kode_mk,' . $this->mata_kuliah->id],
            'nama_mk'   => ['required', 'string', 'max:100'],
            'sks'       => ['required', 'integer', 'min:1', 'max:6'],
            'semester'  => ['required', 'string', 'max:20'],
            'dosen_id'  => ['required', 'exists:dosens,id'],
        ];
    }
}