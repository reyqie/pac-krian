<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EggsExport;
use App\Exports\EggsExport\EggsExport as EggsExportEggsExport;
use App\Http\Controllers\Controller;
use App\Models\Ippnu;
use App\Models\GalleryIppnu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminEggController extends Controller
{
    public function index()
    {
        $ippnus = Ippnu::with('galleryIppnus')->paginate(10);
        return view('admin.pages.tables.data-egg', compact('ippnus'));
    }

    public function create()
    {
        return view('admin.pages.forms.input-egg');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'born' => 'required|date',
            'address' => 'required|string',
            'periode1' => 'required|string|max:255',
            'periode2' => 'required|string|max:255',
            'url' => 'required|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        $ippnu = Ippnu::create(
            $request->only([
                'name',
                'position',
                'born',
                'address',
                'periode1',
                'periode2',
            ])
        );

        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $file) {
                $filename = $file->hashName();
                $file->storeAs('public/ippnus', $filename);

                $ippnu->galleryIppnus()->create(['url' => $filename]);
            }
        }

        return redirect()->route('ippnu.index')->with('status', 'Data IPPNU berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ippnu = Ippnu::findOrFail($id);
        return view('admin.pages.edit.edit-egg', compact('ippnu'));
    }

    public function update(Request $request, Ippnu $ippnu)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'position' => 'nullable|string',
            'born' => 'nullable|date',
            'address' => 'nullable|string',
            'periode1' => 'nullable|string|max:255',
            'periode2' => 'nullable|string|max:255',
            'url' => 'nullable|array',
            'url.*' => 'image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('url')) {

            foreach ($ippnu->galleryIppnus as $galleryIppnu) {
                if ($galleryIppnu->url) {
                    Storage::delete('public/ippnus/' . $galleryIppnu->url);
                }
            }

            $ippnu->galleryIppnus()->forceDelete();

            foreach ($request->file('url') as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $filename = $file->hashName();
                    $file->storeAs('public/ippnus', $filename);
                }

                $ippnu->galleryIppnus()->create([
                    'url' => $filename,
                ]);
            }

            $ippnu->update([
                'name' => $request->name,
                'position' => $request->position,
                'born' => $request->born,
                'address' => $request->address,
                'periode1' => $request->periode1,
                'periode2' => $request->periode2,
            ]);
        }

        $ippnu->update([
            'name' => $request->name,
            'position' => $request->position,
            'born' => $request->born,
            'address' => $request->address,
            'periode1' => $request->periode1,
            'periode2' => $request->periode2,
        ]);


        return redirect()->route('ippnu.index')->with('status', 'Data IPPNU berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ippnu = Ippnu::findOrFail($id);

        foreach ($ippnu->galleryIppnus as $galleryIppnu) {
            if ($galleryIppnu->url) {
                Storage::delete('public/ippnus/' . $galleryIppnu->url);
            }
        }

        $ippnu->forceDelete();

        return redirect()->route('ippnu.index');
    }

    public function export()
    {
        return Excel::download(new EggsExport, 'ippnu.xlsx');
    }
}
