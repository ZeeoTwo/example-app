@extends('layouts.app')

@section('content')
<p class="text-red-700 text-center"> Tytul: {{ $post['title'] }}</p>
<p class="text-yellow-600 text-center">{{ $post['content'] }}</p>
<p class="text-emerald-600 text-left">Autor: {{ $post['author'] }}</p>
@endsection
