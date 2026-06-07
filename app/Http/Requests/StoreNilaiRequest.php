<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNilaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mahasiswa_id'   => ['required', 'exists:mahasiswas,id'],
            'mata_kuliah_id' => [
                'required',
                'exists:mata_kuliahs,id',
                // Prevent duplicate: one student, one course = one grade entry
                'unique:nilais,mata_kuliah_id,NULL,id,mahasiswa_id,' . $this->mahasiswa_id,
            ],
            'nilai_tugas'    => ['required', 'numeric', 'min:0', 'max:100'],
            'nilai_uts'      => ['required', 'numeric', 'min:0', 'max:100'],
            'nilai_uas'      => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'mata_kuliah_id.unique' => 'Mahasiswa ini sudah memiliki nilai untuk mata kuliah tersebut.',
        ];
    }
}