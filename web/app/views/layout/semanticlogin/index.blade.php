<html>
    <head>
        @include('layout.semanticlogin.head')
    </head>
    <body class="bg-black">
        @include('layout.semanticlogin.header')
        @include('layout.semanticlogin.nav')
            @yield('content')
        @include('layout.semanticlogin.footer')
    </body>
</html>