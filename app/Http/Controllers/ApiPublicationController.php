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
    public function unauthorized() {
        return response()->json(['message' => 'Brak autoryzacji'], 401);
    }
}
