@extends('layouts.app')


@section('content')
        <h1 class="text-red-700 text-center"> Logowanie </h1>

        <form action="{{route('auth.login')}}" method="POST">
        @csrf
        <p class="text-amber-400">Login:</p><input type="text" name="login" placeholder="Login">
        <p class="text-amber-400">Hasło:</p><input type="password" name="password" placeholder="Hasło">
        </br>
        </br>
        <input class="text-amber-400 border-2 border-solid border-amber-400 rounded-lg cursor-pointer" type="submit" value="Loguj">
        </form>

@endsection
