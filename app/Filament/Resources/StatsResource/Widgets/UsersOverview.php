<?php

namespace App\Filament\Resources\StatsResource\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users Count', User::count())
                ->icon('heroicon-m-users')
                ->description('This is total user count in the system.')
        ];
    }
}
