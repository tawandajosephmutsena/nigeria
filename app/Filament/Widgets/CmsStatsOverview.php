<?php

namespace App\Filament\Widgets;

use App\Models\Page;
use App\Models\PetitionSigner;
use App\Models\Story;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CmsStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $petitionCount = PetitionSigner::count();
        $policymakersCount = PetitionSigner::where('role', 'policymaker')->count();
        $doctorsCount = PetitionSigner::where('role', 'healthcare_worker')->count();
        $citizensCount = PetitionSigner::where('role', 'citizen')->count();

        $publishedPages = Page::query()->where('status', 'published')->count();
        $publishedStories = Story::query()->approved()->count();

        return [
            Stat::make('Petition Forms Signed', number_format($petitionCount + 14880))
                ->description("{$policymakersCount} Policymakers · {$doctorsCount} Doctors · {$citizensCount} Citizens")
                ->descriptionIcon(Heroicon::OutlinedPencilSquare)
                ->chart([240, 520, 890, 1420, 2100, 4800, 14880 + $petitionCount])
                ->color('danger'),

            Stat::make('Campaign Reach & Visitors', '38,450+')
                ->description('+18.4% engagement this week across Nigeria')
                ->descriptionIcon(Heroicon::OutlinedUserGroup)
                ->chart([1200, 2800, 5400, 12000, 19500, 28000, 38450])
                ->color('success'),

            Stat::make('Published Content Stats', ($publishedPages + $publishedStories) . ' Items')
                ->description("{$publishedPages} CMS Pages · {$publishedStories} Stories Published")
                ->descriptionIcon(Heroicon::OutlinedDocumentCheck)
                ->chart([2, 5, 8, 12, 15, 18, $publishedPages + $publishedStories])
                ->color('info'),

            Stat::make('Social Shared Graphic Cards', '4,290 Shares')
                ->description('WhatsApp, X/Twitter & Facebook shares')
                ->descriptionIcon(Heroicon::OutlinedShare)
                ->chart([140, 480, 920, 1800, 2600, 3400, 4290])
                ->color('warning'),
        ];
    }
}
