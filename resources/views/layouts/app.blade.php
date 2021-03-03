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
</head>
<body class="bg-white min-h-screen antialiased leading-none font-sans">
    <div id="app">
        <nav class="bg-gray-800 shadow-md p-6">
            <div class="container mx-auto md:px-0">
                <div class="flex items-center justify-around">
                    <a class="text-2xl text-white px-3" href="{{url('/home')}}">
                        {{ config('app.name','AragonTriatlon')}}
                    </a>
    
                    <nav class="flex-1 text-right">
                        <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                            <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="text-white no-underline hover:underline hover:text-gray-300 p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>    

                                <a class="no-underline hover:underline text-gray-300 text-sm pd-3" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        @endguest
                    </nav>
            </div>
        </nav>
        <div class="bg-gray-700">
            <nav class="container mx-auto flex flex-space-x-1">
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
