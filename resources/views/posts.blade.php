@extends('layouts.app')
<h1>Welcom in view 'posts' </h1>

@section('content')

    <h1 class="text-red-700 text-center ">Najnowszy artykuł: </h1>

    dump($pub)
    @foreach ($publications as $index => $pub)

    <h2 class="text-amber-400 text-center">
    @dump($pub)
        <a href="{{ route('post.view', ['publication' => $pub -> $id]) }}">
            Publikacja nr {{ $index + 1 }}: {{$pub['title'] }}
        </a>
    </h2>

        <p>Autor: {{ $pub['autor'] }}</p>
    @endforeach


@endsection
