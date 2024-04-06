<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait AdminAuthorization
{
    public static function canCreate(): bool
    {
        return self::isAdmin();
    }

    public static function canEdit(Model $record): bool
    {
        return self::isAdmin();
    }

    public static function canDelete(Model $record): bool
    {
        return self::isAdmin();
    }

    public static function isAdmin(): bool
    {
        return Auth::user()->hasRole('admin');
    }
}
