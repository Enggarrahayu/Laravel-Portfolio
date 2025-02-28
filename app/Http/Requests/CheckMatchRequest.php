<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckMatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'input1' => 'required|string|min:1|max:255',
            'input2' => 'required|string|min:1|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'input1.required' => 'Input pertama wajib diisi.',
            'input1.string' => 'Input pertama harus berupa teks.',
            'input1.min' => 'Input pertama minimal 1 karakter.',
            'input1.max' => 'Input pertama maksimal 255 karakter.',
            'input2.required' => 'Input kedua wajib diisi.',
            'input2.string' => 'Input kedua harus berupa teks.',
            'input2.min' => 'Input kedua minimal 1 karakter.',
            'input2.max' => 'Input kedua maksimal 255 karakter.',
        ];
    }
}
