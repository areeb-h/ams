<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'short',
        'order',
    ];

    public function studyGroups(): BelongsToMany
    {
        return $this->belongsToMany(StudyGroup::class);
    }
}
