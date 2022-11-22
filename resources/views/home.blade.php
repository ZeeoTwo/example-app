@extends('layouts.main')

@section('content')
    @if (isset($publications))
        @foreach ($publications as $index => $pub)
            <h2>Publikacja nr: {{ $index + 1 }}: {{ $pub['title'] }}</h2>
            <h1>Autor: {{ $pub['autor'] }}</h1>
        @endforeach
    @endif
@endsection
