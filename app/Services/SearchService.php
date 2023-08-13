<?php

namespace App\Services;

use App\Models\Announce;
use Carbon\Carbon;

class SearchService
{
    public static function typeCount(string $typeName, string $searchWord)
    {
        $query = Announce::query();

        if ($typeName !== 'all') {
            $typeCount = $query->where('type', \Constant::ANNOUNCE_LIST[$typeName])
                ->where(function ($query) use ($searchWord) {
                    $query->where('name', 'LIKE', '%' . $searchWord . '%')
                        ->orWhere('text', 'LIKE', '%' . $searchWord . '%');
                })
                ->count();
        } else {
            $typeCount = $query->where(function ($query) use ($searchWord) {
                $query->where('name', 'LIKE', '%' . $searchWord . '%')
                    ->orWhere('text', 'LIKE', '%' . $searchWord . '%');
            })
                ->count();
        }

        return $typeCount;
    }

    public static function filterByDateRange($query, string $date)
    {
        switch ($date) {
            case 'always':
                break;
            case 'today':
                $query->whereDate('created_at', '=', Carbon::today());
                break;
            case 'yesterday':
                $query->whereDate('created_at', '=', Carbon::yesterday());
                break;
            case 'last_7days':
                $query->whereDate('created_at', '>=', Carbon::now()->subDays(7));
                break;
            case 'last_30days':
                $query->whereDate('created_at', '>=', Carbon::now()->subDays(30));
                break;
            case 'last_3months':
                $query->whereDate('created_at', '>=', Carbon::now()->subMonths(3));
                break;
            case 'last_12months':
                $query->whereDate('created_at', '>=', Carbon::now()->subYear());
                break;
        }
    }

    public static function filterBySortOrder($query, string $sortOrder)
    {
        switch ($sortOrder) {
            case 'asc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'desc':
                $query->orderBy('created_at', 'desc');
                break;
        }
    }
}
