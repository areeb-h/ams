<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'mobile' => ['sometimes'],
            'address' => ['sometimes'],
            'admission_date' => ['sometimes'],
            'dob' => ['sometimes'],
            'status' => ['sometimes', 'string'],
        ];
    }
}
