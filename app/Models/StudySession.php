<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class StudySession extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'from_time',
        'to_time',
        'duration',
        'description',
        'study_group_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'from_time' => 'datetime',
        'to_time' => 'datetime',
        'study_group_id' => 'integer',
    ];

//    public function students(): BelongsToMany
//    {
//        return $this->belongsToMany(Student::class);
//    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

//    public function course(): BelongsTo
//    {
//        return $this->belongsTo(Course::class);
//    }

    public function studyGroup(): BelongsTo
    {
        return $this->belongsTo(StudyGroup::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function getAttendanceSummaryAttribute()
    {
        $total = $this->attendances->count();
        $attended = $this->attendances->where('attended', 1)->count();

        return "{$attended}/{$total}";
    }

//    protected static function booted(): void
//    {
//        static::saving(function ($studySession) {
//            if ($studySession->study_group_id && $studySession->date) {
//                $studyGroup = StudyGroup::find($studySession->study_group_id);
//                $studySession->from_time = $studyGroup->from_time;
//                $studySession->to_time = $studyGroup->to_time;
//            }
//        });
//    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'attendances')
            ->withPivot('attended');
    }

    protected static function booted()
    {
        static::saving(function ($studySession) {
            $selectedStudentIds = request()->input('student_ids', []);

            foreach ($selectedStudentIds as $studentId) {
                $exists = DB::table('attendances')->where([
                    'study_session_id' => $studySession->id,
                    'student_id' => $studentId,
                ])->exists();

                if (!$exists) {
                    Attendance::create([
                        'study_session_id' => $studySession->id,
                        'student_id' => $studentId,
                    ]);
                }
            }
        });
    }
}
