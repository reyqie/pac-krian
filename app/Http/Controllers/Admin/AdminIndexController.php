<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ippnu;
use App\Models\Ipnu;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function index()
    {
        $ipnus = Ipnu::count();
        $ippnus = Ippnu::count();

        $totalData = $ipnus + $ippnus;

        $latestIpnus = Ipnu::with('galleryIpnus')->latest()->take(5)->get();
        $latestIppnus = Ippnu::with('galleryIppnus')->latest()->take(5)->get();

        return view('admin.index', compact('ipnus', 'ippnus', 'totalData', 'latestIpnus', 'latestIppnus'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $ipnus = Ipnu::where('id', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->orWhere('position', 'like', "%$query%")
            ->orWhere('born', 'like', "%$query%")
            ->orWhere('address', 'like', "%$query%")
            ->orWhere('periode1', 'like', "%$query%")
            ->orWhere('periode2', 'like', "%$query%")
            ->paginate();

        $ippnus = Ippnu::where('id', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->orWhere('position', 'like', "%$query%")
            ->orWhere('born', 'like', "%$query%")
            ->orWhere('address', 'like', "%$query%")
            ->orWhere('periode1', 'like', "%$query%")
            ->orWhere('periode2', 'like', "%$query%")
            ->paginate();

        return view('admin.pages.search.search-result', compact('ipnus', 'ippnus'));
    }
}
