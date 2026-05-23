<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />

        <title>@yield('title', 'NOIR ÉCLAT')</title>

        <meta
            name="description"
            content="@yield('description', 'Luxury fashion and modern collections')"
        />

        <meta property="og:title" content="@yield('title', 'NOIR ÉCLAT')" />
        <meta
            property="og:description"
            content="@yield('description', 'Luxury fashion and modern collections')"
        />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <link rel="stylesheet" href="{{ asset('css/noir-eclat.css') }}" />
        <script type="module" src="{{ asset('js/noir-eclat.js') }}" defer></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>

