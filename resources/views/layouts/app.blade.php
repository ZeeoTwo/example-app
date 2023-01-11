<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>Postownik</title>
</head>
<body class="bg-slate-800">
    @auth
    <div class="fixed top-0 right-0">
    <p class="text-amber-800">Witaj: {{Auth::user()->name}}</p>
    <form action="{{route("auth.logout")}}" method="POST">
        @csrf
        <input class="text-amber-400 border-2 border-solid border-amber-400 rounded-lg cursor-pointer" type="submit" value="Wyloguj">
    </form>
    </div>
    @else
    <a href="{{route('login')}}"></a>
    @endauth


    @yield('content')

</body>
</html>