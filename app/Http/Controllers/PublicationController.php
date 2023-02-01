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
            // 'author_id' => 'required'
        ]);
        $newPost = new Publication($data);
        $newPost->author_id = $request->user()->id;
        $newPost->save();
        return redirect('posts');
    }


    public function edit(Publication $publication)
    {
        $users = User::all();
        
        return view('post.form', [
            'users' => $users,
            'post' => $publication
        ]);
    }


    public function update(Publication $publication, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $publication->fill($data);
        $publication->save();

        if ($request->user()->id !== $publication->author_id) {
            abort(404);
        }

        return redirect()->route('post.view', [
            'publication' => $publication->id
        ])->with('success', 'Zmiany zapisane');
    }


    public function destroy(Publication $publication,Request $request)
    {
        if ($request->user()->id !== $publication->author_id) {
            abort(404);
        }
        $publication->comments()->delete();
        $publication->delete();
        return redirect()->route('post');
    }


}
