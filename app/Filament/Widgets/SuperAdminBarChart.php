<?php

namespace App\Filament\Widgets;

use App\Utils\CheckRole;
use Filament\Widgets\ChartWidget;

class SuperAdminBarChart extends ChartWidget
{
    protected static ?string $heading = 'Diagram Barang Servis';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 2;
    protected function getData(): array
    {
        return [
            'datasets' => [
                    [
                        'label' => 'Banyak Barang Servis',
                        'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    ],
                ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    public static function canView(): bool{
       return CheckRole::CheckIfSuperAdmin();
    }
}
