<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;

use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;
class CommentController extends Controller
{
    
    public function store(Publication $publication,CommentRequest $request)
    {
        // $data = $request->all();
         
        $data = $request->validated();
        $newComment = new Comment($data);
        $newComment->post_id = $publication->id;
        $newComment->author_id = $request->user()->id;
        $newComment->save();

        return redirect()->route('post.view',['publication' => $newComment->post_id
        ])->with('success','dodano komentarz pomyslnie');
    }
}
