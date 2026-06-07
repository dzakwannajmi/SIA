<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDosenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nip'              => ['required', 'string', 'max:20', 'unique:dosens,nip'],
            'nama'             => ['required', 'string', 'max:100'],
            'email'            => ['required', 'email', 'max:100', 'unique:dosens,email'],
            'telepon'          => ['nullable', 'string', 'max:15'],
            'bidang_keahlian'  => ['nullable', 'string', 'max:100'],
        ];
    }
}