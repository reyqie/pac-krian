<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Ippnu;
use App\Models\Ipnu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('web.pages.welcome-animation');
    }

    public function splash()
    {
        return view('web.pages.splash');
    }

    public function index()
    {
        return view('web.pages.index');
    }
}
