<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CmsStatsOverview;
use App\Filament\Widgets\DashboardQuickActionsWidget;
use App\Filament\Widgets\LatestMessagesWidget;
use App\Filament\Widgets\LatestPetitionsWidget;
use App\Filament\Widgets\RecentCommentsAndStoriesWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;

class Dashboard extends BaseDashboard
{
    protected static ?int $navigationSort = -2;

    protected static ?string $title = 'Campaign Dashboard';

    protected ?string $heading = 'Unfinished — Maternal Health Reform Dashboard';

    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            DashboardQuickActionsWidget::class,
            CmsStatsOverview::class,
            LatestPetitionsWidget::class,
            RecentCommentsAndStoriesWidget::class,
            LatestMessagesWidget::class,
        ];
    }
}
