<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (!$search) {
            return redirect()->back();
        }

        $users = User::where('name', 'LIKE', '%' . $search . '%')
            ->latest()
            ->paginate(10);
        $announces = Announce::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('text', 'LIKE', '%' . $search . '%')
            ->latest()
            ->paginate(10);

        return view('search', compact('users', 'announces'));
    }
}
