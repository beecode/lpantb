<html>
    <head>
        @include('layout.bootstrap.head')
    </head>
    <body>
        @include('layout.bootstrap.header')
        @include('layout.bootstrap.nav')
        <div id="paga-wrapper">
            @yield('content')
        </div>
        @include('layout.bootstrap.footer')
    </body>
</html>