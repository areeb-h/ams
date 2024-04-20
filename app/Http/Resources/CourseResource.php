<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_type_id' => $this->course_type_id,
            'name' => $this->name,
            'code' => $this->code,
            'age_range' => $this->age_range,
            'fee' => $this->fee,
            'description' => $this->description,
            'course_image_url' => $this->course_image_url? 'http://localhost:8000/storage/' . $this->course_image_url : null,
        ];
    }
}
