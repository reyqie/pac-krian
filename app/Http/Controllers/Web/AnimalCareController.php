<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ipnu;
use Carbon\Carbon;

class AnimalCareController extends Controller
{
    public function index()
    {
        // $ipnus = Ipnu::with('galleryIpnus')->get()->map(function ($ipnu) {
        //     $ipnu->formatted_date = Carbon::parse($ipnu->born)->translate('d M Y');
        //     return $ipnu;
        // });

        // return view('web.pages.animal-care', compact('ipnus'));
    }
}
