<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DashboardQuickActionsWidget extends Widget
{
    protected static ?int $sort = 0;

    protected string $view = 'filament.widgets.dashboard-quick-actions-widget';

    protected int | string | array $columnSpan = 'full';
}
