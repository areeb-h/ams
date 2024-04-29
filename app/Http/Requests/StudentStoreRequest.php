<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class StudentStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'admission_date' => ['sometimes'],
            'mobile' => ['sometimes'],
            'dob' => ['sometimes'],
            'address' => ['sometimes'],
            'status' => ['sometimes', 'string'],
            'sid' => ['required', 'string', 'unique:students'],
        ];
    }

//    #[NoReturn] protected function failedValidation(Validator|\Illuminate\Contracts\Validation\Validator $validator): void
//    {
//        dd($validator->errors());
//    }
}
