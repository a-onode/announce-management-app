<?php

namespace App\Services;

use App\Models\Announce;

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
}
