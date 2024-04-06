<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLocations extends ListRecords
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Centres';
    }

    public function getBreadcrumbs(): array
    {
        return [
            url()->route('filament.admin.resources.locations.index') => $this->getTitle(),
            '#' => 'list',
        ];
    }
}
