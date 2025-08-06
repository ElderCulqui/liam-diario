<?php

namespace App\Filament\Resources\BinnacleTypeResource\Pages;

use App\Filament\Resources\BinnacleTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBinnacleType extends EditRecord
{
    protected static string $resource = BinnacleTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
