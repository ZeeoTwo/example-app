@extends('layouts.app')

@section('content')

    <h1>This Is Home Site</h1>

    @auth
    @else
    <a class=" top-0 right-0  text-red-700 border-2 border-solid border-red-700 rounded-lg cursor-pointer" href="{{ route('login') }}">Login </a>
    @endauth

@endsection
