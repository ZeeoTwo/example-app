<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.2/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Postownik</title>
</head>
<body class="">
    <div class="drawer">
    
    <input id="my-drawer" type="checkbox" class="drawer-toggle " />
    
    <div class="drawer-content">
        <!-- Page content here -->
        @if ($message = Session::get('success'))
          <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
              <i class="bi bi-check w-5 h-5 inline mr-1"></i>
              <div>
                  {{ $message }}
              </div>
          </div>
        @endif

        @auth
      <div class="absolute top-0 right-0">
      <p class="text-amber-800">Witaj: {{Auth::user()->name}}</p>
      <form action="{{route("auth.logout")}}" method="POST">
          @csrf
          <input class="text-amber-400 border-2 border-solid border-amber-400 rounded-lg cursor-pointer" type="submit" value="Wyloguj">
      </form>
      </div>
      @else
      <a href="{{route('login')}}"></a>
      @endauth

      {{-- @php
          $token = null;
          if (Auth::check()) {
              $token = Auth::user()->tokens()->where('name', Auth::user()->name)->first();
          }
      @endphp --}}
{{-- 
      @auth
        @if (!$token)
            <a class=" top-0 left-0 text-red-700 border-2 border-solid border-red-700 rounded-lg cursor-pointer" href="{{ route('token') }}">Generate Token </a>
        @else
            <a class='top-0 left-0 text-red-700 border-2 border-solid border-red-700 rounded-lg cursor-pointer'>{{$token->plainTextToken}}</a>
        @endif
      @endauth --}}

      <label for="my-drawer" class="flex rounded-r-lg bg-white h-32 w-6 cursor-pointer mt-80 "></label>
    </div> 
    <div class="drawer-side ">
      <label for="my-drawer" class="drawer-overlay"></label>
      
      <ul class="menu p-4 w-40 bg-slate-800">
        
        <!-- Sidebar content here -->
        <li > <a  href="{{ route('home') }}">  Home </a>  </li>
        <li > <a  href="{{ route('post') }}">  Posty </a>  </li>
        <li > <a  href="{{ route('posts.create') }}">  Dodaj Post </a>  </li>
        <li > <a  href="{{ route('auth.login') }}">  Login </a>  </li>
        
      </ul>
    </div>
  </div>

    <div class="absolute text-center top-32 right-2/4 transform translate-x-1/2 ">
      @yield('content')
  </div>
</body>
</html>