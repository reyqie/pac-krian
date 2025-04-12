<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index()
    {
        // $news = News::with('galleryNews')->get()->map(function ($news) {
        //     $new->formatted_date = Carbon::parse($new->date_event)->translate('d M Y');
        //     return $new;
        // });

        $news = News::with('galleryNews')->orderBy('created_at', 'desc')->paginate(10);

        return view('web.pages.news', compact('news'));
    }

    public function show($id)
    {
        $newDetails = News::with('galleryNews')->findOrFail($id);
        $newsAll = News::with('galleryNews')->orderBy('created_at', 'desc')->paginate(8);

        return view('web.pages.news-details', compact('newDetails', 'newsAll'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $news = News::where('id', 'like', "%$query%")
            ->orWhere('title', 'like', "%$query%")
            ->orWhere('content', 'like', "%$query%")
            ->get();

        return view('web.pages.news', compact('news'));
    }
}
