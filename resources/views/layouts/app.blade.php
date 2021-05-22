<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AragonTriatlon') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        @yield('styles')

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body class="bg-white min-h-screen antialiased leading-none font-sans">
        <div id="app">
            <div >
                <nav class="mx-auto">
                    @yield('navegacion')
                </nav>
            </div>
            <main >
                @yield('content')
            </main>
        </div>
        
        @yield('scripts')
    </body>
</html>
