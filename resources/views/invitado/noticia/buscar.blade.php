<div class="flex justify-between items-center mb-5 ">
    <form action={{route('invitado.noticias.buscar')}} method="POST">
        @csrf
        <label for="buscar" class="inline text-gray-700 text-2xl">Buscar noticia:</label>
        <input id="titulo" type="text" class="inline p-3 bg-white rounded form-input  @error('titulo') is-invalid @enderror" name="titulo" value="{{isset($noticia->titulo)? ($noticia->titulo): old('nombre')}}" placeholder="Titulo" autocomplete="titulo" autofocus>
        @error('titulo')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4  mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        <input id="autor" type="text" class="inline p-3 bg-white rounded form-input  @error('autor') is-invalid @enderror" name="autor" value="{{isset($noticia->user->name)? ($noticia->user->name): old('autor')}}" placeholder="Autor" autocomplete="autor" autofocus>
        @error('autor')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <button type="submit" class="bg-gray-100 inline hover:bg-gray-300 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10" >Buscar</button>
    </form>
</div>