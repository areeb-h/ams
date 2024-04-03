<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line',
        'code',
        'island',
        'coordinate',
        'maps_url'
    ];

    public function studyGroups(): HasMany
    {
        return $this->hasMany(StudyGroup::class);
    }
}
