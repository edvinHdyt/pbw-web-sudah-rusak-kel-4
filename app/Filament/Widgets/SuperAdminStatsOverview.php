<?php

namespace App\Filament\Widgets;

use App\Utils\CheckRole;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuperAdminStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make("Total Barang Sedang Di Cek", "25")
                ->icon("fas-magnifying-glass-arrow-right")
                ->description("total barang yang di cek per 2026"),
            Stat::make("Total Barang Diservis", "80")
                ->icon("fas-spinner")
                ->description("Total barang yang sedang di servis per 2026"),
            Stat::make("Total Barang Selesai Diservis", "66")
                ->icon("fas-circle-check")
                ->description("total barang selesai servis per 2026"),
        ];
    }

    public static function canView(): bool
    {
        return CheckRole::CheckIfSuperAdmin();
    }
}
