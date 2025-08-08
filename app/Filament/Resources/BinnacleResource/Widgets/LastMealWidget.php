<?php

namespace App\Filament\Resources\BinnacleResource\Widgets;

use App\Models\BinnacleType;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LastMealWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $lastFeeding = $this->getLastByType(BinnacleType::TYPE_FEEDING);
        $lastFeedingDate = $lastFeeding ? $lastFeeding->date_register->diffForHumans() : 'Sin datos';

        $lastDeposition = $this->getLastByType(BinnacleType::TYPE_DEPOSITION);
        $lastDepositionDate = $lastDeposition ? $lastDeposition->date_register->diffForHumans() : 'Sin datos';

        return [
            Stat::make('Última comida', $lastFeedingDate)
                ->description('Respecto a la fecha actual')
                ->descriptionIcon('heroicon-m-cake', IconPosition::Before)
                ->chart([1,3,9,5,4,8,10])
                ->color('success'),
            Stat::make('Última deposición', $lastDepositionDate)
                ->description('Respecto a la fecha actual')
                ->descriptionIcon('heroicon-m-trash', IconPosition::Before)
                ->chart([1,3,9,5,4,8,10])
                ->color('warning'),
        ];
    }

    private function getLastByType($type)
    {
        return \App\Models\Binnacle::whereHas('binnacleType',
            fn ($q) => $q->whereName($type)
        )->latest()->first();
    }
}
