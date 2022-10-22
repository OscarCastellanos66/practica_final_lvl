<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">PRACTICA LARAVEL</span>
          
            <ul class="nav justify-content-end">
              @if(auth()->check())
                <li class="nav-item">
                    <span class="text-white">Welcome {{Auth::user()->name}}</span>

                    <a class="btn btn-outline-light" href="{{route('login.destroy')}}">Log out</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="btn btn-outline-light" href="{{route('login.index')}}">Log In</a>
                
                  <a class="btn btn-outline-light" href="{{route('register.index')}}">Register</a>
                </li>
              @endif
            </ul>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>