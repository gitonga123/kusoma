<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/thesaas.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('img/favicon.png') }}" rel="icon">


</head>
<body>
<!-- Topbar -->

<div id="app">

<nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
    <div class="container">

        <div class="topbar-left">
            <button class="topbar-toggler">&#9776;</button>
            <a class="topbar-brand" href="index.html">
                <img class="logo-default" src="{{asset('img/logo.png')}}" alt="logo">
                <img class="logo-inverse" src="{{asset('img/logo-light.png')}}" alt="logo">
            </a>
        </div>


        <div class="topbar-right">
            <ul class="topbar-nav nav">
                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                @if(Auth::check())
                    Hey {{ auth()->user()->name }}
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#loginModal">Login <i class="nav-link"></i></a>

                    </li>
                @endif
            </ul>
        </div>

    </div>
</nav>
<!-- END Topbar -->

    @yield('header')

    <main class="main-content">
        @yield('content')
    </main>
    {{-- <my-first></my-first> --}}
    @if(!Auth::check())
        <vue-login></vue-login>
    @endif
    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row gap-y align-items-center">
                <div class="col-12 col-lg-3">
                    <p class="text-center text-lg-left">
                        <a href="index.html"><img src="{{asset('img/logo.png')}}" alt="logo"></a>
                    </p>
                </div>

                <div class="col-12 col-lg-6">
                    <ul class="nav nav-primary nav-hero">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="block-feature.html">Features</a>
                        </li>
                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link" href="page-pricing.html">Pricing</a>
                        </li>
                        <li class="nav-item hidden-sm-down">
                            <a class="nav-link" href="page-contact.html">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="social text-center text-lg-right">
                        <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                        <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                        <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
                        <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>    <!-- Scripts -->
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/thesaas.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
