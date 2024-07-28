<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}} defer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between p-4 px-md-4 bg-white border-bottom shadow-sm mb-3">
        <h5 class="my-0 mr-md-auto font-weight-normal">Blog Posts</h5>
        <nav class="my-2 my-md mr-md-3 underline-none">
            <a href="{{route('home.index')}}" class="p-2 text-dark text-decoration-none">Home</a>
            <a href="{{route('posts.index')}}" class="p-2 text-dark text-decoration-none">Blog Posts</a>
            <a href="{{route('posts.create')}}" class="p-2 text-dark text-decoration-none">Add</a>
            @auth
                <a href="{{route('auth.logout')}}" class="p-2 text-dark text-decoration-none">Logout({{session('loginName')}})</a>

            @endauth
            @guest
                <a href="{{route('auth.login')}}" class="p-2 text-dark text-decoration-none">Login</a>
                <a href="{{route('auth.registration')}}" class="p-2 text-dark text-decoration-none">Register</a>
            @endguest
        </nav>
    </div>

    <div class="container">
        @if (session('status'))
            <div style="background-color: lightgreen; display:inline-block;">{{session('status')}}</div>
        @endif
        @yield('content')
    </div>

</body>
</html>
