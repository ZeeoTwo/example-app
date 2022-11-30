@extends('layouts.app')

@section('content')
        <h1 class="text-red-700 text-center"> Stworz nową publikację </h1>

        <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <p class="text-amber-400">Title:</p><input type="text" name="title">
        <p class="text-amber-400">Content:</p><textarea name="content" cols="20" rows="1"></textarea>
        <p class="text-amber-400">User:</p><select name="author_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
        </select>
        </br>
        </br>
        <input class="text-amber-400 border-2 border-solid border-amber-400 rounded-lg cursor-pointer" type="submit" value="Submit">
        </form>

@endsection
