<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use App\Exports\NewsExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::with('galleryNews')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.tables.data-news', compact('news'));
    }

    public function create()
    {
        return view('admin.pages.forms.input-news');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date_event' => 'required|date',
            'url' => 'required|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        $news = News::create(
            $request->only([
                'title',
                'content',
                'date_event',
            ])
        );

        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $file) {
                $filename = $file->hashName();
                $file->storeAs('public/news', $filename);

                $news->galleryNews()->create(['url' => $filename]);
            }
        }

        return redirect()->route('news.index')->with('status', 'Data Berita Acara berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.pages.edit.edit-news', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'date_event' => 'nullable|date',
            'url' => 'nullable|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('url')) {

            foreach ($news->galleryNews as $galleryNew) {
                if ($galleryNew->url) {
                    Storage::delete('public/news/' . $galleryNew->url);
                }
            }

            $news->galleryNews()->forceDelete();

            foreach ($request->file('url') as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $filename = $file->hashName();
                    $file->storeAs('public/news', $filename);
                }

                $news->galleryNews()->create([
                    'url' => $filename,
                ]);
            }

            $news->update([
                'title' => $request->title,
                'date_event' => $request->date_event,
                'content' => $request->content
            ]);
        }

        $news->update([
            'title' => $request->title,
            'date_event' => $request->date_event,
            'content' => $request->content
        ]);


        return redirect()->route('news.index')->with('status', 'Data Berita Acara berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        foreach ($news->galleryNews as $galleryNew) {
            if ($galleryNew->url) {
                Storage::delete('public/news/' . $galleryNew->url);
            }
        }

        $news->forceDelete();

        return redirect()->route('news.index');
    }

    public function export()
    {
        return Excel::download(new NewsExport, 'news.xlsx');
    }
}
