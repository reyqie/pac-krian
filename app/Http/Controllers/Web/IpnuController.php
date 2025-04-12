<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Ipnu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IpnuController extends Controller
{
    public function index()
    {
        $ipnus = Ipnu::with('galleryIpnus')->get()->map(function ($ipnu) {
            $ipnu->formatted_date = Carbon::parse($ipnu->born)->translate('d M Y');
            return $ipnu;
        });

        return view('web.pages.gecko', compact('ipnus'));
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
            ->get();

        return view('web.pages.gecko', compact('ipnus'));
    }
}
