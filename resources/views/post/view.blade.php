@extends('layouts.app')

@section('content')
@auth
<a href="{{ route('posts.edit', ['publication' => $post->id]) }}">Edytuj</a>
<form action="{{ route('posts.delete', ['publication' => $post->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Usuń</button>
</form>
@endauth
<p class="text-red-700 text-center"> Tytul: {{ $post['title'] }}</p>
<p class="text-yellow-600 text-center">{{ $post['content'] }}</p>
<p class="text-emerald-600 text-left">Autor: {{ $post['author']->name }}</p>

        <div class="text-center space-y-7 mx-64 my-5">
            Komentarze: 
                @foreach ($post->comments as $comment)
                <div class="border-solid border-2">
                    <p class="">{{$comment->author->name}}</p>
                    <p class="">{{$comment->content_comment}}</p>
                    <p class="">{{$comment->created_at}}</p>
                </div>
                @endforeach
        </div>


@endsection
