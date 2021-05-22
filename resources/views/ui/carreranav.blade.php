<div class="fixed w-full border-b md:flex md:items-center md:justify-between p-4 pb-0 shadow-lg md:pb-4">
  
    <!-- Logo text or image -->
    <div class="flex items-center justify-between mb-4 md:mb-0">
      <h1 class="leading-none text-2xl text-grey-darkest">
        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/image.png')}}"/>
     
        <a class="text-2xl no-underline text-white px-3" href="{{url('/home')}}">
            {{ config('app.name','AragonTriatlon')}}
        </a>
      </h1>
  
      <a class="text-white hover:text-orange md:hidden" href="/home">
        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/image.png')}}"/>
      </a>
    </div>
    <!-- END Logo text or image -->
    
    <!-- Search field -->
    <form class="mb-4 w-full md:mb-0 md:w-1/4">
      <label class="hidden" for="search-form">Buscar</label>
      <input class="bg-grey-lightest border-2 focus:border-orange p-2 rounded-lg shadow-inner w-full" placeholder="Buscar" type="text">
      <button class="hidden">Submit</button>
    </form>
    <!-- END Search field -->
    
    <!-- Global navigation -->
    <nav>
      <ul class="list-reset md:flex md:items-center">
        <li class="md:ml-4">
          <a class="block no-underline hover:underline py-2 text-white hover:text-gray-200 md:border-none md:p-0" href="{{route('Carreras.create')}}">
            Agregar Nueva Carrera

          </a>
        </li>
      </ul>
    </nav>
    <!-- END Global navigation -->
  
</div>