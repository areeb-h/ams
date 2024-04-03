<?php

namespace App\Filament\Resources\StudySessionResource\Pages;

use App\Filament\Resources\StudySessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudySession extends EditRecord
{
    protected static string $resource = StudySessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
