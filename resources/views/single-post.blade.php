@extends('layouts.app')
<h1>Welcom in view 'posts_of_index' </h1>

@section('content')
<p class="text-red-700 text-center"> Tytul: {{ $post['title'] }}</p>
<p class="text-yellow-600 text-center">{{ $post['content'] }}</p>
<p class="text-emerald-600 text-left">Autor: {{ $post['author'] }}</p>
@endsection
