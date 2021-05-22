<!-- Menú de navegación del show de carreras con botón para ver el mapa de carreras -->
<style>
    .scroll-hidden::-webkit-scrollbar {
      height: 0px;
      background: transparent; /* make scrollbar transparent */
    }
  </style>
  
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  
  <header x-data="{ isOpen: false }" class="bg-white">
    <nav class="container mx-auto px-6 py-3">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a class="text-gray-800 text-xl font-bold  hover:text-gray-700"><h1 class="leading-none text-2xl py-4 text-black">
                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/image.png')}}"/>
                    
                        @if (Auth::check())
                            <a class="inline md:text-3xl no-underline hover:text-teal-600 px-3" href="{{route('admin')}}">
                                {{ config('app.name','AragonTriatlon')}}
                            </a>
                        @else
                            <a class="inline md:text-3xl no-underline hover:text-teal-600 px-3" href="{{route('invitado')}}">
                                {{ config('app.name','AragonTriatlon')}}
                            </a>
                        @endif
                    </h1></a>
                </div>
        
                
                <div class="flex md:hidden">
                    <button @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                    </button>
                </div>
                </div>
        
                <div class="md:flex items-center" :class="isOpen ? 'block' : 'hidden'">
                <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1 ">
                    <a class="my-1 text-2xl text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../atletas_clubes">Atletas</a>
                    <a class="my-1 text-2xl text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../clubes">Clubes</a>
                    <a class="my-1 text-2xl text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../carreras_clasificaciones">Carreras</a>
                    <a class="my-1 text-2xl text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../noticias">Noticias</a>
                    @if (Auth::check())
                        <a class="my-1 text-2xl text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="../administracion">Administración</a>
                    @endif
                </div>
                
                <div class="flex items-center py-2 -mx-1 md:mx-0">
                    <a class="block  px-3 py-2 mx-1 rounded text-center text-sm md:text-2xl  bg-indigo-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" href="{{route('Atletas.create')}}">
                        Crear Atleta
                    </a>
                </div>
                <div class="flex items-center py-2 -mx-1 md:mx-0">
                    <a class="block  px-3 py-2 mx-1 rounded text-center text-sm md:text-2xl md:ml-6 bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" onclick="goBack()">
                        Volver
                    </a>
                </div>
            </div>
      </div>
  
      <script>
        function goBack() {
          window.history.back();
        }
        </script>
    </nav>
  </header>