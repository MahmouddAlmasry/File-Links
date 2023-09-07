<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mahmoud</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/elzero.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
            <a href="#" class="logo">Mahmoud</a>
            @if (Route::has('login'))
                <ul class="main-nav">
                    @auth
                        <li><a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
            @endif
            </ul>
        </div>
    </div>

    <!-- Start Events -->
    <div class="events" id="events">
        <h2 class="main-title">File search </h2>
        <div class="container">
            <div class="show">
                @if ($error ?? '')
                    <div>{{$error}}</div>
                @endif

            </div>
        </div>

    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
