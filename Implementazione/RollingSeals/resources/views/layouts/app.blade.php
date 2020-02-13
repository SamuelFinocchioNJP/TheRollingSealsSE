<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet" />

        <!-- Materialize CSS -->
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <style>
            .brand-logo {
                margin-left: 10px;
            }

            .card-image img {
                height: 100px;
                object-fit: cover;
            }

           .card-title {
               font-weight: bolder;
           }
        </style>
    </head>

    <body>
        <nav>
            <div class="nav-wrapper purple">
                <a href="#" class="brand-logo">
                    Ciao !
                </a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#">Home</a></li>

                    <li>
                        <a href="#">Il Team {{ config("app.name", "Laravel") }}</a>
                    </li>

                    <li><a href="#">Progetto</a></li>

                    <li>
                        <a href="{{ route('login') }}">{{ __("Login") }}</a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}">
                            {{  __("Register")  }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col s12 center">
                <h1>Rolling Seals</h1>
                <h2>Universities List</h2>
            </div>
        </div>

        <div id="app">
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <footer class="page-footer purple">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text"> The Rolling Seals</h5>
                        <p class="grey-text text-lighten-4">
                            Software Engineering project <br>
                            2019/20
                        </p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    UnivAQ
                                </a>
                            </li>

                            <li>
                                <a class="grey-text text-lighten-3" href="#!">
                                    GitHub
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-copyright">
                <div class="container">
                    © 2020 Copyright RollingSeals 
                    <a class="grey-text text-lighten-4 right" href="#">
                        More Links
                    </a>
                </div>
            </div>
        </footer>
    </body>
</html>
