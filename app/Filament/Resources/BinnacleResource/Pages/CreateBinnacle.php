<?php

namespace App\Filament\Resources\BinnacleResource\Pages;

use App\Filament\Resources\BinnacleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBinnacle extends CreateRecord
{
    protected static string $resource = BinnacleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    }
}
