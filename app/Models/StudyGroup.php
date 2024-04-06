<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'from_time',
        'to_time',
        'duration',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'from_time' => 'datetime',
        'to_time' => 'datetime',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function course(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function studySessions(): HasMany
    {
        return $this->hasMany(StudySession::class);
    }

    public function days(): BelongsToMany
    {
        return $this->belongsToMany(Day::class);
    }

    public function location(): belongsTo
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    protected static function booted(): void
    {
        static::saving(function ($studyGroup) {
            if ($studyGroup->from_time && $studyGroup->to_time) {
                $fromTime = Carbon::parse($studyGroup->from_time);
                $toTime = Carbon::parse($studyGroup->to_time);
                $duration = $fromTime->diffInMinutes($toTime);
                $studyGroup->duration = number_format($duration, '0');
            }

//            if (!$studyGroup->name && $studyGroup->course()->exists()) {
//                $course = $studyGroup->course()->first();
//
//                if ($course) {
//                    $courseName = $course->name;
//                    $formattedFromTime = $fromTime->format('Hi');
//                    $formattedToTime = $toTime->format('Hi');
//                    $locationCode = $studyGroup->location->code?? 'HMP1';
//                    $studyGroup->name = "{$courseName}_{$formattedFromTime}_{$formattedToTime}_{$locationCode}";
//                }
//            }
        });
    }
}
