<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    @stack('css')
    <script src={{asset('js/ajax.js') }}></script>
</head>
<body class="body_">
<div class="top">
    <div class="top_left">
        <button class="openMenu" onclick="menuOpen()" >&#9776;</button>
    </div>
    <img alt="logo" src={{asset('img/MarioLOGO.png')}} class="img_logo">
    <div class="top_right">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container_login">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            @guest
                                @if (Route::has('login'))
                                    <li onclick="popUp()" class="nav-item">
                                        <a class="nav-link" ><img alt="login" src={{asset('img/buttons/login.png')}}>{{ __('Войти') }}</a>
                                    </li>
                                    </button>
                                @endif
                                @else
                                    <li>
                                        <a href="{{ route('cart.list') }}"><button class="basket"><img alt="card" src={{asset('img/buttons/card.png')}}></button></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <img alt="logout" src={{asset("img/buttons/logout.png")}}>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="menu">
    <nav class="menu-list">
        <a href="{{route('home.index')}}">Главная</a>
        <a href="{{route('catalog.index')}}">Каталог</a>
        <a href="{{route('home.master')}}">Мастер-классы</a>
        <a href="{{route('home.about')}}">О нас </a>
        <a href="">Наши достижения</a>
        <a href="{{route('home.news')}}">Новости</a>
    </nav>
</div>
<div class="container">
    @yield('content')
</div>
@include('auth.login')
<footer>
    <button class="inst"> <a href="https://instagram.com/mario.sevastopol?utm_medium=copy_link"><img alt="instagram" src={{asset('img/socials/instagram.png')}}></a></button>
    <button class="telega"> <a href="https://www.pinterest.ru/danilovuha/_saved/"><img alt="telegram" src={{asset('img/socials/telegram.png')}}></a></button>
    <button class="vk"><a href="https://vk.com/mario.sevastopol"><img alt="vk" src={{asset('img/socials/vk.png')}}></a></button>
</footer>
<script src={{asset('js/layout.js') }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src={{asset('js/valid.js') }}></script>
</body>
</html>
