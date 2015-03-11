<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.lteadmin.head')
    </head>
    <body class="skin-blue">
        @include('layout.lteadmin.js')
        @include('layout.lteadmin.header')
        @include('layout.lteadmin.nav')
        @yield('content')
        @include('layout.lteadmin.footer')
    </body>
</html>