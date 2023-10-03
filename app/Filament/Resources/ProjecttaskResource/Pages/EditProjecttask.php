<?php

namespace App\Filament\Resources\ProjecttaskResource\Pages;

use App\Filament\Resources\ProjecttaskResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjecttask extends EditRecord
{
    protected static string $resource = ProjecttaskResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
