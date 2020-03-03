<!DOCTYPE html>

<html>

    <head>
        <!--Import Google Icon Font-->
        <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
        <!--Import personal stylesheet-->
        <link type = "text/css" rel = "stylesheet" href = "{{ URL::asset('css/app.css') }}"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <!--JavaScript at end of body for optimized loading-->
        <script type = "text/javascript" src = "{{ URL::asset('js/app.js') }}"></script>

        <header>
            @include('layouts.header')
        </header>

        <main id = "app">
            @yield('content')
        </main>

        <footer class = "page-footer cyan darken-3 white-text">            
            @include('layouts.footer')
        </footer>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems, {});
            });
        </script>
    </body>

</html>