<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\User;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchWord = $request->input('search_word');
        $searchTarget = $request->input('search_target');
        $type = $request->input('type');

        if (!$searchWord) {
            return redirect()->back();
        }

        switch ($searchTarget) {
            case 'announce':
                $query = Announce::query();

                if ($type && $type !== \Constant::ANNOUNCE_LIST['all']) {
                    $query->where('type', $type);
                }

                $announces = $query->where('name', 'LIKE', '%' . $searchWord . '%')
                    ->orWhere('text', 'LIKE', '%' . $searchWord . '%')
                    ->latest()
                    ->paginate(10);
                $allCount = SearchService::typeCount('all', $searchWord);
                $generalCount = SearchService::typeCount('general', $searchWord);
                $techCount = SearchService::typeCount('tech', $searchWord);
                $operationCount = SearchService::typeCount('operation', $searchWord);
                $officeCount = SearchService::typeCount('office', $searchWord);

                return view('search.announces', compact('announces', 'allCount', 'generalCount', 'techCount', 'operationCount', 'officeCount'));

            case 'user':
                $users = User::where('name', 'LIKE', '%' . $searchWord . '%')
                    ->latest()
                    ->paginate(10);

                return view('search.users', compact('users'));

            default:
                return redirect()->back();
        }
    }
}
