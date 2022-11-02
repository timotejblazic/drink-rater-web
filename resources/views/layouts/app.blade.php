<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $pageTitle }}</title>

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/js/custom.js'])
    </head>
    <body class="body">
        <div class="body__inner">
            <!-- Page Heading -->
            <header class="header">
                <div class="header__inner">
                    <div class="header__left">
                        LOGO
                    </div>
                    <div class="header__right">

                        <nav class="main-nav">
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link1</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link2</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link3</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link4</a>
                            </div>
                        </nav>

                        <!-- HAMBURGER -->
                        <div class="hamburger-icon">
                            <div class="hamburger-icon1"></div>
                            <div class="hamburger-icon2"></div>
                            <div class="hamburger-icon3"></div>
                        </div>
                        
                        <nav class="hamburger-nav">
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link1</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link2</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link3</a>
                            </div>
                            <div class="nav__item">
                                <a href="#" class="nav__link">Link4</a>
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
