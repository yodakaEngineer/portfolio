<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', "Yodaka's Services") }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    
                    <!-- Navbar Left -->
                    <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                        @guest
                        @else
                        <ul class="nav navbar-nav navbar-left">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/tasks') }}">Task List</a>
                        </ul>
                        @endguest
                    </div>
                    <!-- Navbar Right -->
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        @guest
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">ログイン</a></li>
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">ユーザ登録</a></li>
                            </ul>
                        @else
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-secondary" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div><!-- /.dropdown -->
                        @endguest
                    </div>
                </div>
            </nav>
        </header>
        <main>
        @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>