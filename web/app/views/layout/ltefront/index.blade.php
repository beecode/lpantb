<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.ltefront.head')
    </head>
    <body class="skin-blue">
        @include('layout.ltefront.js')
        @include('layout.ltefront.header')
        @yield('content')
        @include('layout.ltefront.footer')
    </body>
</html>