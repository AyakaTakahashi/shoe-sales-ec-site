<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/ec-site.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<body>
    <div id="app">
        {{-- headerコンポーネントの読み込み --}}
        @component('components.header')
        @endcomponent

        <main class="py-4 mb-5">
            @yield('content')
        </main>

        {{-- footerコンポーネントの読み込み --}}
        @component('components.footer')
        @endcomponent
    </div>
</body>
</html>
