<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Publication;


class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderBy('created_at','desc')->limit(1);

        return view('posts', ['publications' => $publications]);
    }


    public function show(Publication $publication)
    {   
        return view('single-post', [
            'post' => $publication
        ]);
    }
    

}