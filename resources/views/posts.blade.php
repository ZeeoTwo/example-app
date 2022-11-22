@extends('layouts.app')

@section('content')

    <h1 class="text-red-700 text-center ">Najnowszy artykuł: </h1>
    @foreach ($publications as $index => $pub)
    <h2 class="text-amber-400 text-center">
        <a href="{{ route('post.view', ['id' => $pub->$id]) }}">
            Publikacja nr {{ $index + 1 }}: {{$pub['title'] }}
        </a>
    </h2>

        <p>Autor: {{ $pub['autor'] }}</p>
    @endforeach


@endsection
