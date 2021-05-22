<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>Aragon Triatlon</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  </head>
  <body class="text-gray-700 bg-white" style="font-family: 'Source Sans Pro', sans-serif">
    <!-- component -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="p-4 flex flex-row items-center justify-between">
        <a href="#" class="text-l font-bold lg:text-2xl   tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline" >
          <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/image.png')}}"/>AragonTriatlon
        </a>      
        <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
          <span :class="{'flex': !open, 'hidden': open}">Login</span>
        </button>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col justify-end flex-grow-2 pb-4 md:pb-0 hidden md:flex-row md:justify-end ">
          <ul class="flex items-center">
            @if(Route::has('login'))
              @auth
                  <li>
                    <button class="hidden md:inline mb-4 md:mb-2 bg-transparent text-black p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                      <a class="px-4 py-2 mt-2 hover:text-gray-800 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline no-underline hover:underline text-sm font-normal text-teal-800 uppercase" href="{{ url('/home') }}">{{ __('Home') }}</a>
                    </button>
                  </li>
              @else
                <li><a class="px-4 py-2 mt-2  bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline no-underline hover:underline text-sm font-normal text-teal-800 uppercase hover:text-gray-800" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                  @if (Route::has('register'))
                      <li><a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                  @endif
              @endauth  
              <svg :class="{'flex': open, 'hidden': !open}" @click="open = !open" fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6 items-center md:inline-flex md:justify-end">   
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>  
            @endif
          </ul>         
        </nav>
      </div>   
      <ul class="hidden md:block ">
        @if(Route::has('login'))
          @auth
            <a class="px-4 py-2 mt-2 hover:text-gray-800 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline no-underline hover:underline text-sm font-normal text-teal-800 uppercase" href="{{ url('/home') }}">{{ __('Home') }}</a>
          @else
            <a class="px-4 py-2 mt-2  bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline no-underline hover:underline text-sm font-normal text-teal-800 uppercase hover:text-gray-800" href="{{ route('login') }}">{{ __('Login') }}</a>
              @if (Route::has('register'))
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
          @endauth   
        @endif
      </ul> 
    </div>    
  </div>
    
      <div class="py-20" style="background: linear-gradient(90deg, #032738 0%, #9ab6f3 100%)">
      <div class="container mx-auto px-6 ">
        
        <h1 class=" text-2xl text-center sm:items-center font-bold mb-2 sm:text-6xl text-white">
          Federación Aragonesa de Triatlon
        </h1>
      </div>
    </div>

    <section class="container mx-auto px-6 p-10">

      <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2">
          <a href="{{ route('atletas_clubes') }}">
            <img class="hidden md:block gg-image-white rounded-full py-3 px-6" width="600"  alt="Logo" src="{{asset('storage/uploads/imagenes/landing_page/atletas.png')}}"/> 
          </a>
        </div>
    
        <div class="w-full md:w-1/2 md:pl-10 ">
          <a href="{{ route('atletas_clubes') }}">
            <h4 class="text-3xl text-gray-800 font-bold mb-3">Atletas</h4>
            <p class="text-gray-600 mb-8">Toda la información sobre los atletas inscritos en nuestras competiciones</p>
          </a>
        </div>

        <div class="w-full md:w-1/2">
          <a href="{{ route('atletas_clubes') }}">
            <img class="block md:hidden gg-image-white rounded-full py-3 px-6" width="600"  alt="Logo" src="{{asset('storage/uploads/imagenes/landing_page/atletas.png')}}"/> 
          </a>
        </div>
      </div>

      <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2">
          <a href="{{ route('carreras_clasificaciones') }}">
            <h4 class="text-3xl text-gray-800 font-bold mb-3">Carreras y Clasificaciones</h4>
            <p class="text-gray-600 mb-8">Consulta las pruebas, el calendario y tus resultados</p>
          </a>
        </div>
        <div class="w-full md:w-1/2">
          <a href="{{ route('carreras_clasificaciones') }}">
            <img class=" gg-image-white inline rounded-full"  alt="Logo" src="{{asset('storage/uploads/imagenes/landing_page/carrera.png')}}"/> 
          </a>
        </div>
      </div>
    
      <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2">
          <a href="{{route('clubes')}}">
            <img class="hidden md:block gg-image-white rounded-full py-3 px-6" width="1600"  alt="Logo" src="{{asset('storage/uploads/imagenes/landing_page/clubes.png')}}"/> 
          </a>
        </div>
    
        <div class="w-full md:w-1/2 md:pl-10 ">
          <a href="{{route('clubes')}}">
            <h4 class="text-3xl text-gray-800 font-bold mb-3">Clubes</h4>
            <p class="text-gray-600 mb-8">Conoce todos los clubes y sus atletas inscritos en nuestras competiciones</p>
          </a>
        </div>

        <div class="w-full md:w-1/2">
          <a href="{{route('clubes')}}">
            <img class="block md:hidden gg-image-white rounded-full py-3 px-6" width="600"  alt="Logo" src="{{asset('storage/uploads/imagenes/landing_page/clubes.png')}}"/> 
          </a>
        </div>
      </div>
    
      <div class="flex items-center flex-wrap mb-20">
        <div class="w-full md:w-1/2">
          <a href="{{ route('noticias') }}">
            <h4 class="text-3xl text-gray-800 font-bold mb-3">Noticias</h4>
            <p class="text-gray-600 mb-8">Te mantenemos informado de todas las novedades relacionadas con el triatlón en Aragón</p>
          </a>
        </div>
        <div class="w-full md:w-1/2">
          <a href="{{ route('noticias') }}">
          <img class="gg-image-white inline rounded-full px-15"  alt="Logo" src="{{asset('storage/uploads/imagenes/landing_page/noticias.png')}}"/>
        </div>
      </div>
    </section>

    <section style="background: linear-gradient(90deg, #032738 0%, #9ab6f3 100%)">
      <div class="container mx-auto px-6 py-20">
        <h2 class="text-4xl font-bold text-center text-white mb-8">
          Testimonios
        </h2>
        <div class="flex flex-wrap">
          <div class="w-full md:w-1/3 px-2 mb-4">
            <div class="bg-white rounded shadow py-2">
              <p class="text-blue-800 text-base px-6 mb-5">“Puedes continuar y terminar la carrera y las piernas te dolerán una semana; o puedes renunciar y tu mente te dolerá toda la vida”</p>
              <p class="text-blue-700 text-xs md:text-sm px-6">Mark Allen, seis veces campeón del mundo Ironman.</p>
            </div>
          </div>
          <div class="w-full md:w-1/3 px-2 mb-4">
              <div class="bg-white rounded shadow py-2">
                <p class="text-blue-800 text-base px-6 mb-5">“Si te planteas una meta y eres capaz de alcanzarla, entonces habrás ganado tu carrera.</p>
                <p class="text-blue-700 text-xs md:text-sm px-6">Dave Scott, ganador de Ironman Hawaii en seis ocasiones, primer atleta introducido en el salón de la fama de Ironman.</p>
              </div>
            </div>
          <div class="w-full md:w-1/3 px-2 mb-4">
            <div class="bg-white rounded shadow py-2">
              <p class="text-blue-800 text-base px-6 mb-5">“Nunca comienzo una carrera esperando ganar, pero siempre espero pelear”.</p>
              <p class="text-blue-700 text-xs md:text-sm px-6">Chrissie Wellington, cuatro veces ganadora del campeonato del mundial de Ironman.</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <footer style="background: linear-gradient(90deg, #032738 0%, #9ab6f3 100%)">
      <div class="container mx-auto px-6 pt-10 pb-6">
        <div class="flex flex-wrap">
          <div class="w-full md:w-1/4 text-center text-white  md:text-left">
            <h5 class="uppercase mb-6 font-bold">Links</h5>
            <ul class="mb-4">
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">FAQ</a>
              </li>
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Help</a>
              </li>
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Support</a>
              </li>
            </ul>
          </div>
          <div class="w-full md:w-1/4 text-center text-white md:text-left">
            <h5 class="uppercase mb-6 font-bold">Legal</h5>
            <ul class="mb-4">
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Terms</a>
              </li>
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Privacy</a>
              </li>
            </ul>
          </div>
          <div class="w-full md:w-1/4 text-center text-white md:text-left">
            <h5 class="uppercase mb-6 font-bold">Social</h5>
            <ul class="mb-4">
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Facebook</a>
              </li>
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Linkedin</a>
              </li>
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Twitter</a>
              </li>
            </ul>
          </div>
          <div class="w-full md:w-1/4 text-center text-white md:text-left">
            <h5 class="uppercase mb-6 font-bold">Company</h5>
            <ul class="mb-4">
              <li class="mt-2">
                <a href="http://www.google.com" class="hover:underline text-white hover:text-orange-500">Official Blog</a>
              </li>
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">About Us</a>
              </li>
              <li class="mt-2">
                <a href="#" class="hover:underline text-white hover:text-orange-500">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>



