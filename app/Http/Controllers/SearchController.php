<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchWord = $request->input('search_word');
        $searchTarget = $request->input('search_target');
        $category = $request->input('category');

        if (!$searchWord) {
            return redirect()->back();
        }

        switch ($searchTarget) {
            case 'announce':
                $announces = Announce::where('name', 'LIKE', '%' . $searchWord . '%')
                    ->orWhere('text', 'LIKE', '%' . $searchWord . '%')
                    ->latest()
                    ->paginate(10);

                return view('search.announces', compact('announces'));

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
