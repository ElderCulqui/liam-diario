<?php

namespace App\Filament\Resources\BinnacleTypeResource\Pages;

use App\Filament\Resources\BinnacleTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBinnacleTypes extends ListRecords
{
    protected static string $resource = BinnacleTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
