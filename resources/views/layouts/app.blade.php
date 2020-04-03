<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/xs-icon.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a class="navbar-brand" href="{{ route('home') }}">
                        Dashboard
                    </a>


                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    @auth()
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="@if($active_module == \App\Models\Enums\ModuleType::CATEGORIES) active @endif"><a href="{{ route('categories.index') }}">Kategorie</a></li>
                        <li class="@if($active_module == \App\Models\Enums\ModuleType::SERVICES) active @endif"><a href="{{ route('services.index') }}">Usługi</a></li>
                        <li class="@if($active_module == \App\Models\Enums\ModuleType::PORTFOLIO) active @endif"><a href="{{ route('portfolio.index') }}">Galeria</a></li>
                        <li class="@if($active_module == \App\Models\Enums\ModuleType::CERTIFICATES) active @endif"><a href="{{ route('certificates.index') }}">Certyfikaty</a></li>
                        <li class="@if($active_module == \App\Models\Enums\ModuleType::PRICING) active @endif"><a href="{{ route('pricing.index') }}">Cennik</a></li>
                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
                <div class="row">
                    @yield('content')
                </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    @yield('javascript_content')

</body>
</html>
