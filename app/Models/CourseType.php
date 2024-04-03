<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'course_type_image_url',
    ];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function getStudentsCountAttribute()
    {
        return $this->courses->sum(function ($course) {
            return $course->students->count();
        });
    }
}
