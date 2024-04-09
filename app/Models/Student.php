<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'mobile',
        'admission_date',
        'dob',
        'status',
        'sid',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sid' => 'string',
        'admission_date' => 'datetime',
        'dob' => 'datetime',
    ];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

//    public function attendances(): HasMany
//    {
//        return $this->hasMany(Attendance::class);
//    }

    public function studySessions(): BelongsToMany
    {
        return $this->belongsToMany(StudySession::class, 'attendances')
            ->withPivot('attended');
    }

    public function getAttendanceAttribute()
    {
        if (is_null($this->attendance_score)) {
            return '-';
        }

        return "{$this->attended_sessions}/{$this->total_sessions}";
    }


    public function updateAttendanceDetails(): void
    {
        $totalSessions = $this->studySessions()->count();

        $fullyAttendedSessions = $this->studySessions()
            ->wherePivot('attended', 1)
            ->wherePivot('status', '!=', 'late')->count();

        $lateAttendedSessions = $this->studySessions()
                ->wherePivot('attended', 1)
                ->wherePivot('status', 'late')->count() * 0.5;

        $attendedSessions = $fullyAttendedSessions + $lateAttendedSessions;

        $this->attended_sessions = (int) $attendedSessions;
        $this->total_sessions = $totalSessions;

        if ($totalSessions > 0) {
            $attendancePercentage = ($attendedSessions / $totalSessions) * 100;
        } else {
            $attendancePercentage = null;
        }

        $this->attendance_score = (int) $attendancePercentage ;
        $this->save();
    }



}
