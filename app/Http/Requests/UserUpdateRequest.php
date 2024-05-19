<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email'],
            'type' => ['sometimes', 'string'],
            'status' => ['sometimes', 'string'],
            'email_verified_at' => ['nullable'],
            'password' => ['sometimes', 'string'],
            'two_factor_secret' => ['nullable', 'string'],
            'two_factor_recovery_codes' => ['nullable', 'string'],
            'two_factor_confirmed_at' => ['nullable'],
            'remember_token' => ['nullable', 'string', 'max:100'],
            'current_team_id' => ['nullable', 'integer'],
            'profile_photo_path' => ['nullable', 'string', 'max:2048'],
        ];
    }
}
