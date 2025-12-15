<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.berita.index', [
            'beritas' => Berita::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Berita::where('slug', Str::slug($request->title))->exists()) {
            return redirect()->back()->withErrors(['title' => 'Title sudah ada'])->withInput();
        }
        
        if ($request->cover) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->putFileAs('berita', $file, $filename);        
        }
        
        Berita::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'cover' => $filename ?? null
        ]);
        
        return redirect()->route('dashboard.berita.index')->with('success', 'Berhasil Menambahkan Berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $beritum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        return view('dashboard.berita.edit', [
            'berita' => $beritum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        $slug = Str::slug($request->title);

        $exists = Berita::where('slug', $slug)
            ->where('id', '!=', $beritum->id)
            ->exists();
    
        if ($exists) {
            return redirect()->back()->withErrors([
                'title' => 'Judul sudah digunakan, silakan pilih judul lain.'
            ]);
        }

        if ($request->cover) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->putFileAs('berita', $file, $filename);        
            $beritum->update([
                'cover' => $filename ?? null
            ]);
        }
        
        $beritum->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
        ]);
        
        return redirect()->route('dashboard.berita.index')->with('success', 'Berhasil Mengedit Berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        $beritum->delete();
        
        return redirect()->route('dashboard.berita.index')->with('success', 'Berhasil Menghapus Berita');
    }
}
