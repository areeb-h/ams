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

    public function getAttendanceAttribute(): string
    {
        $attended = $this->studySessions()->where('attended', 1)->count();
        $totalClasses = $this->studySessions()->count();

        if ($totalClasses === 0) {
            return 'N/A';
        }

        $attendancePercentage = ($attended / $totalClasses) * 100;

        $attendancePercentageFormatted = number_format($attendancePercentage, 1) . '%';

        return "$attended/$totalClasses | $attendancePercentageFormatted";
    }

}
