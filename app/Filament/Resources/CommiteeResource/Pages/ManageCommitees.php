<?php

namespace App\Filament\Resources\CommiteeResource\Pages;

use App\Filament\Resources\CommiteeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCommitees extends ManageRecords
{
    protected static string $resource = CommiteeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
