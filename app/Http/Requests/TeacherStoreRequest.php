<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
