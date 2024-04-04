<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

//    protected function handleRecordCreation(array $data): Model
//    {
//        $verificationTime = now();
//
//        $user = User::create(Arr::except($data, ['role']));
//
//        $user->email_verified_at = now();
//        $user->save();
//
//        $user->assignRole($data['role']);
//
//        return $user;
//    }
}
