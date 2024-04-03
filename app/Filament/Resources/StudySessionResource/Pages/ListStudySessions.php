<?php

namespace App\Filament\Resources\StudySessionResource\Pages;

use App\Filament\Resources\StudySessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudySessions extends ListRecords
{
    protected static string $resource = StudySessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
