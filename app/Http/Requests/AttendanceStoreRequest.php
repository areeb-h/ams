<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'attended' => ['required'],
            'student_id' => ['required', 'integer', 'exists:students,id'],
            'study_session_id' => ['required', 'integer', 'exists:study_sessions,id'],
        ];
    }
}
