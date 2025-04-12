<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Ippnu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IppnuController extends Controller
{
    public function index()
    {
        $ippnus = Ippnu::with('galleryIppnus')->get()->map(function ($ippnu) {
            $ippnu->formatted_date = Carbon::parse($ippnu->born)->translate('d M Y');
            return $ippnu;
        });

        return view('web.pages.egg', compact('ippnus'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $ippnus = Ippnu::where('id', 'like', "%$query%")
            ->orWhere('tanggal_inkubasi', 'like', "%$query%")
            ->orWhere('perkawinan', 'like', "%$query%")
            ->orWhere('keterangan', 'like', "%$query%")
            ->get();

        return view('web.pages.egg', compact('ippnus'));
    }
}
