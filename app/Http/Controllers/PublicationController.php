<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Publication;


class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::all();
        return view('posts', [
            'publications' => $publications
        ]);
    }
    public function show(int $id)
    {
        // Znajdź modele o wskazanym ID i zwróć tylko jeden, a jak go nie znajdziesz to zwróć błąd 404.
        $publication = Publication::where('id', $id)->firstOrFail();
    
        return view('single-post', [
            'post' => $publication
        ]);
    }
    


}