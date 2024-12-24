<?php

namespace App\Filament\Resources\MainNavigationResource\Pages;

use App\Filament\Resources\MainNavigationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMainNavigation extends EditRecord
{
    protected static string $resource = MainNavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
