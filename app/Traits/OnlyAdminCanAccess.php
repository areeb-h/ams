<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait OnlyAdminCanAccess
{
    public static function canAccess(): bool
    {
        return Auth::user()->hasRole('admin');
    }
}
