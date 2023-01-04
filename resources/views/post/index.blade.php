{{-- dd($publications[0]->author->publications) --}}
@extends('layouts.app')

@section('content')

    <a class="text-red-700 border-2 border-solid border-red-700 rounded-lg cursor-pointer" href="{{ route('posts.create') }}">Dodaj Post </a>

    @foreach ($publications as $index => $pub)
    <h2 class="text-amber-400 text-center">
        <a href="{{ route('post.view', ['publication' => $pub->id]) }}">
            Publikacja nr {{ $index + 1 }}: {{$pub['title'] }}
        </a>
    </h2>

    
        @if ($pub['author']->deleted_at)
        <s class="text-emerald-600 text-left">Autor: {{ $pub['author']->name }}</s>
        @else
        <p class="text-emerald-600 text-left">Autor: {{ $pub['author']->name }}</p>
        @endif
    @endforeach


@endsection
