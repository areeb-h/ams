<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyGroup extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function studySessions(): HasMany
    {
        return $this->hasMany(StudySession::class);
    }
}
