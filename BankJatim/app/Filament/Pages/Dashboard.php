<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Widgets\Widget;

use BackedEnum;

class Dashboard extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected string $view = 'filament.pages.dashboard';

    protected static ?string $slug = '/';

    protected static ?string $title = 'Dashboard';

    // Override the default layout to use our custom full-page layout
    protected static string $layout = 'layouts.landing';

    public function mount(): void
    {
        // Initialize any data here if needed
    }

    public function getHeaderWidgets(): array
    {
        return [
            // Add widgets here if needed
        ];
    }
}
