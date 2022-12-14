<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\User;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderBy('created_at', 'desc')->get();

        return view('post.index', ['publications' => $publications]);
    }

    public function show(Publication $publication)
    {
        return view('post.view', [
            'post' => $publication,
            'comments' => $publication->comments
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('post.form',['users' => $users]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author_id' => 'required'
        ]);
        $newPost = new Publication($data);
        $newPost->save();
        return redirect('posts');
    }
}
