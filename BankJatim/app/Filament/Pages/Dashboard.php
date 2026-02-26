<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $title = 'Bank Jatim';

    protected string $view = 'filament.pages.dashboard';

    protected static string $layout = 'components.layouts.landing';
}
