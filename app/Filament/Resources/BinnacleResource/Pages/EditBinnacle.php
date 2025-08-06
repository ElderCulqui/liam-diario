<?php

namespace App\Filament\Resources\BinnacleResource\Pages;

use App\Filament\Resources\BinnacleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBinnacle extends EditRecord
{
    protected static string $resource = BinnacleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
