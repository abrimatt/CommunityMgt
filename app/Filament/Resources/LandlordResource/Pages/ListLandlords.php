<?php

namespace App\Filament\Resources\LandlordResource\Pages;

use App\Filament\Resources\LandlordResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandlords extends ListRecords
{
    protected static string $resource = LandlordResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
