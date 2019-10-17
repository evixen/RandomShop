<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md shadow-sm" id="navbar-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6" id="navbar-left">
                    <a href="{{ route('shop.admin.main') }}" class="navbar-brand text-dark">Панель админстрирования</a>
                </div>
                <div class="col-sm-6" id="navbar-right">
                    <div class="row justify-content-end align-items-center">
                        <div class="col-sm-4 navbar-text">
                            <span>Привет, {{ Auth::user()->name }}!</span>
                        </div>
                        <div class="col-sm-3 navbar-text p-0">
                            <a href="{{ route('shop.main') }}">
                                <button class="btn btn-sm btn-primary">На главную</button>
                            </a>
                        </div>
                        <div class="col-sm-2 p-0">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Выйти</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</div>
</nav>

<div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-sm-3">
            {{-- Sidebar --}}
            <nav id="sidebar">
                <ul class="navbar-nav d-flex">
                    <li class="nav-item"><a href="{{ route('shop.admin.main') }}"
                                            class="nav-link text-light">Управление</a></li>
                    <li class="nav-item"><a href="{{ route('shop.admin.categories.index') }}"
                                            class="nav-link">Категории</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('shop.admin.products.index') }}"
                                            class="nav-link">Товары</a></li>
                    <li class="nav-item"><a href="{{ route('shop.admin.users') }}"
                                            class="nav-link">Пользователи</a></li>
                    <li class="nav-item"><a href="{{ route('shop.admin.orders.index') }}"
                                            class="nav-link">Заказы</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-sm-8">
            {{-- Content --}}
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

</body>
</html>

