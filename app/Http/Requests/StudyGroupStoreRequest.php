<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyGroupStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_time' => ['required'],
            'to_time' => ['required'],
            'duration' => ['required', 'integer'],
            'description' => ['required', 'string'],
        ];
    }
}
