@extends('layouts.app')

    @vite(['/resources/js/reply.js'])

@section('content')


@auth
    @if (auth()->user()->id == $post->author_id)
    <a href="{{ route('posts.edit', ['publication' => $post->id]) }}">Edytuj</a>
    <form action="{{ route('posts.delete', ['publication' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Usuń</button>
    </form>
    @endif
@endauth
<p class="text-red-700 text-center"> Tytul: {{ $post['title'] }}</p>
<p class="text-yellow-600 text-center">{{ $post['content'] }}</p>
<p class="text-emerald-600 text-left">Autor: {{ $post['author']->name }}</p>



        <div class="text-center space-y-7 mx-64 my-5">
            Komentarze: 
                </br>
                
                @php
                $comments = $post->comments()->withTrashed()->get();
                @endphp

                    
                @foreach ($post->comments()->withTrashed()->get() as $comment)
                @if (!($comment->hasParent()))
                    <x-comment :comment="$comment"/>
                @endif
                @endforeach
        </div>

        {{-- ~ Formularz Komentarzy~ --}}
        @auth
            <form action="{{ route('comments.store', ['publication' => $post])}}" method="POST">
            @csrf
            <input type="hidden" id="parent" name="parent_id" value="">
            <textarea name="content_comment" placeholder="Treść Komentarza"></textarea>
            @error("content_comment") <p>{{$message}}</p>@enderror
            </br>
            <button type="submit">Dodaj Komentarz</button>
            </form>
        @endauth


@endsection
