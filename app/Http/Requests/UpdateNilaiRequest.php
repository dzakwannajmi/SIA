<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNilaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nilai_tugas' => ['required', 'numeric', 'min:0', 'max:100'],
            'nilai_uts'   => ['required', 'numeric', 'min:0', 'max:100'],
            'nilai_uas'   => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }
}