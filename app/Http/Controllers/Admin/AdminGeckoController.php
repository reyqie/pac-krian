<?php

namespace App\Http\Controllers\Admin;

use App\Exports\GeckosExport;
use App\Http\Controllers\Controller;
use App\Models\Ipnu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminGeckoController extends Controller
{
    public function index()
    {
        $ipnus = Ipnu::with('galleryIpnus')->paginate(10);
        return view('admin.pages.tables.data-gecko', compact('ipnus'));
    }

    public function create()
    {
        return view('admin.pages.forms.input-gecko');
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

        $ipnu = Ipnu::create(
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
                $file->storeAs('public/ipnus', $filename);

                $ipnu->galleryIpnus()->create(['url' => $filename]);
            }
        }

        return redirect()->route('ipnu.index')->with('status', 'Data IPNU berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ipnu = Ipnu::findOrFail($id);
        return view('admin.pages.edit.edit-gecko', compact('ipnu'));
    }

    public function update(Request $request, Ipnu $ipnu)
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

            foreach ($ipnu->galleryIpnus as $galleryIpnu) {
                if ($galleryIpnu->url) {
                    Storage::delete('public/ipnus/' . $galleryIpnu->url);
                }
            }

            $ipnu->galleryIpnus()->forceDelete();

            foreach ($request->file('url') as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile) {
                    $filename = $file->hashName();
                    $file->storeAs('public/ipnus', $filename);
                }

                $ipnu->galleryIpnus()->create([
                    'url' => $filename,
                ]);
            }

            $ipnu->update([
                'name' => $request->name,
                'position' => $request->position,
                'born' => $request->born,
                'address' => $request->address,
                'periode1' => $request->periode1,
                'periode2' => $request->periode2,
            ]);
        }

        $ipnu->update([
            'name' => $request->name,
            'position' => $request->position,
            'born' => $request->born,
            'address' => $request->address,
            'periode1' => $request->periode1,
            'periode2' => $request->periode2,
        ]);


        return redirect()->route('ipnu.index')->with('status', 'Data IPNU berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ipnu = Ipnu::findOrFail($id);

        foreach ($ipnu->galleryIpnus as $galleryIpnu) {
            if ($galleryIpnu->url) {
                Storage::delete('public/ipnus/' . $galleryIpnu->url);
            }
        }

        $ipnu->forceDelete();

        return redirect()->route('ipnu.index');
    }

    public function export()
    {
        return Excel::download(new GeckosExport, 'ipnu.xlsx');
    }
}
