<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'age_range',
        'fee',
        'description',
        'course_image_url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function enrolledStudents(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function courseType(): BelongsTo
    {
        return $this->belongsTo(CourseType::class);
    }

    public function studySessions(): BelongsToMany
    {
        return $this->belongsToMany(StudySession::class);
    }

    public function studyGroups(): BelongsToMany
    {
        return $this->belongsToMany(StudyGroup::class);
    }

//    public function setCourseImageUrlAttribute($value): void
//    {
//        if ($value instanceof UploadedFile) {
//            $filePath = $value->store('course_images', 'public');
//            $this->attributes['course_image_url'] = Storage::disk('public')->url($filePath);
//        } else {
//            $this->attributes['course_image_url'] = $value;
//        }
//    }
//
//    public function getCourseImageUrlAttribute($value): ?string
//    {
//        if (!$value) {
//            return null;
//        }
//
//        return Storage::disk('public')->url($value);
//    }

}
