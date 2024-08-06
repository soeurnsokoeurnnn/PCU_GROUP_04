<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ url('css/frontend/theme.css') }}" rel="stylesheet">
        <link href="{{ url('css/frontend/bootstrap.css') }}" rel="stylesheet">
    </head>
    <body>    
        <header>
            <div class="container">
                <div class="logo">
                    <a href="">
                        {{-- <h1 class="py-4">
                            KH FASHION
                        </h1> --}}
                        <img src="/uploads/{{ $logo[0]->thumbnail }}" width="200px">
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="/">HOME</a>
                    </li>
                    <li>
                        <a href="/shop">SHOP</a>
                    </li>
                    <li>
                        <a href="/news">NEWS</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="/search" method="get">
                        <input type="text" name="s" class="box" placeholder="SEARCH HERE">
                        <button>
                            <div style="background-image: url(/uploads/search.png);
                                        width: 28px;
                                        height: 28px;
                                        background-position: center;
                                        background-size: contain;
                                        background-repeat: no-repeat;
                            "></div>
                        </button>
                    </form>
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <span>
                AllRight Recieved @ 2024
            </span>
        </footer>

    </body>
    <script src="{{ url('css/frontend/bootstrap.js') }}"></script>
</html>