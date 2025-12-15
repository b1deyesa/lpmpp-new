<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $beritum)
    {
        return view('page.berita.show', [
            'berita' => $beritum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        //
    }
}
