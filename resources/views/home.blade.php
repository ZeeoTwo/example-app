@extends('layouts.main')

@section('content')

    {{-- zrob tutaj pasek po lewej od homa --}}
<a class=" text-red-700 border-2 border-solid border-red-700 rounded-lg cursor-pointer" href="{{ route('login') }}">Login </a>

@endsection
