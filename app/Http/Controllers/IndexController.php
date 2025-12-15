<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        $program_studis = Http::get('https://sipenjamu-lpmpp-unpatti.id/api/program-studi')->collect('data');
        $akreditasis = Http::get('https://sipenjamu-lpmpp-unpatti.id/api/akreditasi')->collect('data');

        return view('index', [
            'beritas'                => Berita::orderBy('id', 'desc')->get(),
            'program_studis'         => $program_studis,
            'akreditasis'            => $akreditasis,
        ]);
    }
}
