<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\Support\Htmlable;
use Override;

class Dashboard extends BaseDashboard{

    public function getHeading(): string | Htmlable{
      return "Dashbard";
    }

    #[Override]
    public function getSubheading(): string|Htmlable|null
    {
        $name = auth()->user()->nama;

        return 'Selamat datang, '. $name."!";
    }
}
