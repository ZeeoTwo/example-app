@extends('layouts.app')

@php
    $action = route('posts.store');
    $title = null;
    $content = null;
    $author_id = null;
    $header = "Dodaj Publikację";
if (isset($post)) {
        $action = route('posts.update', ['publication' => $post->id]);
        $title = $post->title;
        $content = $post->content;
        $author_id = $post->author_id;
        $header = "Edytuj Publikację";
    }



@endphp


@section('content')
        <h1 class="text-red-700 text-center"> {{$header}} </h1>

        <form action="{{ $action }}" method="POST">
        @csrf
        <p class="text-amber-400">Title:</p><input type="text" name="title" placeholder="Tytuł" value="{{ $title }}">
        <p class="text-amber-400">Content:</p><textarea name="content" cols="20" rows="1" placeholder="Treść...">{{ $content }}</textarea>
        {{-- <p class="text-amber-400">User:</p>
         <select name="author_id">
        @foreach ($users as $user)
            <option {{ $author_id == $user->id ? 'seelectd' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>

        @endforeach
        </select> --}}
        </br>
        </br>
        <input class="text-amber-400 border-2 border-solid border-amber-400 rounded-lg cursor-pointer" type="submit" value="Submit">
        </form>

@endsection
