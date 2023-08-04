<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STPI</title>
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialiased">

        @include('layouts.frontend.partials.navstd')

        @yield('content')

        @include('layouts.frontend.partials.footer')
    </body>
</html>