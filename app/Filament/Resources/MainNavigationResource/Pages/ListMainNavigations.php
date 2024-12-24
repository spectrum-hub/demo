<?php

namespace App\Filament\Resources\MainNavigationResource\Pages;

use App\Filament\Resources\MainNavigationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMainNavigations extends ListRecords
{
    protected static string $resource = MainNavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
