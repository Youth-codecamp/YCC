<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Course;
use App\Models\Provider;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Courses', Course::all()->count())
                ->description(str(Course::all()->count()) . ' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            // Stat::make('Active', Course::where('is_deleted', 0)->get()->count()),
            // Stat::make('Deleted Courses', Course::where('is_deleted', 1)->get()->count()),
            Stat::make('Total Providers', Provider::all()->count())
                ->description(str(Provider::all()->count()) . ' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Users', User::all()->count())
                ->description(str(User::all()->count()) . ' increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')

        ];
    }
}
