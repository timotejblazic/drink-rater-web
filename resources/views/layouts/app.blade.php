<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $pageTitle }}</title>

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>
    <body class="body">
        <div class="body__inner">
            <!-- Page Heading -->
            <header class="header">
                <div class="header__inner">
                    <div class="header__left">
                        <a href="{{ URL::to('/') }}">LOGO</a>
                    </div>
                    <div class="header__right">

                        <nav class="main-nav">
                            <div class="nav__item">
                                <a href="{{ route('home') }}" class="nav__link">Home</a>
                            </div>
                            <div class="nav__item">
                                <a href="{{ route('drinks') }}" class="nav__link">All Drinks</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Favorited Drinks</a>
                            </div>
                        </nav>

                        <!-- USER MENU -->
                        <div class="user-nav dropdown-click">
                            <div class="dropdown__first">
                                <div class="dropdown__first__icon">
                                    <img src="{{ asset('images/svgs/user.svg') }}" alt="user" width="40" height="40">
                                </div>
                                @auth
                                    <div class="dropdown__first__title">
                                        <div>Welcome, </div>
                                        <div>{{ Auth::user()->name }}</div>
                                    </div>
                                @endauth
                            </div>
                            <div class="dropdown__main">
                                <div class="dropdown__main__item">
                                    <a href="{{ route('dashboard') }}" class="dropdown__main__link">Profile</a>
                                </div>
                                @auth
                                    <div class="dropdown__main__item">
                                        <form method="POST" action="{{ route('logout') }}" class="dropdown__main__link">
                                            @csrf

                                            <button type="submit" style="color:red;">Log Out</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="dropdown__main__item">
                                        <a href="{{ route('register') }}" class="dropdown__main__link">Register</a>
                                    </div>
                                    <div class="dropdown__main__item">
                                    <a href="{{ route('login') }}" class="dropdown__main__link">Log In</a>
                                </div>
                                @endauth 
                            </div>
                        </div>

                        <!-- HAMBURGER -->
                        <div class="hamburger-icon">
                            <div class="hamburger-icon1"></div>
                            <div class="hamburger-icon2"></div>
                            <div class="hamburger-icon3"></div>
                        </div>
                        
                        <nav class="hamburger-nav">
                            <div class="nav__item">
                                <a href="{{ route('home') }}" class="nav__link">Home</a>
                            </div>
                            <div class="nav__item">
                                <a href="{{ route('drinks') }}" class="nav__link">All Drinks</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Favorited Drinks</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            

            <!-- Page Content -->
            <main class="main">
                <div class="main__inner">
                    {{ $slot }}
                </div>
            </main>


            <!-- Page Footer -->
            <footer class="footer">
                <div class="footer__inner">
                    <div class="footer__copyright">
                        Copyright 2022
                    </div>
                    <div class="footer__contact">
                        Contact us: john@example.com
                    </div>
                </div>
            </footer>
            
        </div>
    </body>
</html>
