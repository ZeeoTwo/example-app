<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublicationResource;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiPublicationController extends Controller
{
    public function index(){
        $publications = Publication::all();
        return new JsonResponse(PublicationResource::collection($publications));
    }
    public function view(Publication $publication){
        return new JsonResponse(new PublicationResource($publication));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author_id' => 'required',
        ]);
        $publication = new Publication();
        $publication->title = $validatedData['title'];
        $publication->content = $validatedData['content'];
        $publication->author_id = $validatedData['author_id'];
        $publication->save();
        return response()->json(new PublicationResource($publication), 201);
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();
        return response()->json(['message' => 'Publication deleted successfully']);
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author_id' => 'required',
        ]);
        $publication->title = $validatedData['title'];
        $publication->content = $validatedData['content'];
        $publication->author_id = $validatedData['author_id'];
        $publication->save();
        return response()->json(new PublicationResource($publication));
    }

    public function unauthorized() {
        return response()->json(['message' => 'Brak autoryzacji'], 401);
    }
}
