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

    public function getTitle(): string
    {
        return 'Sessions';
    }

    public function getBreadcrumbs(): array
    {
        return [
            url()->route('filament.admin.pages.dashboard') => 'Dashboard',
            url()->route('filament.admin.resources.study-sessions.index') => 'Sessions',
        ];
    }
}
