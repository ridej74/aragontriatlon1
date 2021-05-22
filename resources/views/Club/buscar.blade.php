
<div class="flex justify-between items-center mb-5 ">
    <form action={{route('clubes.buscar')}} method="POST">
        @csrf
        <label for="buscar" class="inline text-gray-700 text-2xl">Buscar club:</label>
        <input id="nombre" type="text" class="inline p-3 bg-white rounded form-input  @error('nombre') is-invalid @enderror" name="nombre" value="{{isset($club->nombre)? ($club->nombre): old('nombre')}}" placeholder="Nombre" autocomplete="nombre" autofocus>
        @error('nombre')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4  mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        <input id="direccion" type="text" class="inline p-3 bg-white rounded form-input  @error('direccion') is-invalid @enderror" name="direccion" value="{{isset($club->direccion)? ($club->direccion): old('direccion')}}" placeholder="Direccion" autocomplete="direccion" autofocus>
        @error('direccion')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="mail" type="text" class="inline p-3 bg-white rounded form-input  @error('mail') is-invalid @enderror" name="mail" value="{{isset($club->mail)? ($lub->mail): old('mail')}}" placeholder="Mail" autocomplete="mail" autofocus>
        @error('mail')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-5" role="alert">Buscar</button>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    

        <button type="submit" class="bg-gray-100 inline hover:bg-gray-300 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10" >Buscar</button>
    </form>
</div>