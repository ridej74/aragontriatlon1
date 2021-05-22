
<div class="flex justify-between items-center mb-5 ">
    <form action={{route('atletas.buscar')}} method="POST">
        @csrf
        <label for="buscar" class="inline text-gray-700 text-2xl">Buscar atleta:</label>
        <input id="nombre" type="text" class="inline p-3 bg-white rounded form-input  @error('nombre') is-invalid @enderror" name="nombre" value="{{isset($atleta->nombre)? ($atleta->nombre): old('nombre')}}" placeholder="Nombre" autocomplete="nombre" autofocus>
        @error('nombre')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4  mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        <input id="apellido_1" type="text" class="inline p-3 bg-white rounded form-input  @error('apellido_1') is-invalid @enderror" name="apellido_1" value="{{isset($atleta->apellido_1)? ($atleta->apellido_1): old('apellido_1')}}" placeholder="Primer apellido" autocomplete="apellido_1" autofocus>
        @error('apellido_1')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="apellido_2" type="text" class="inline p-3 bg-white rounded form-input  @error('apellido_2') is-invalid @enderror" name="apellido_2" value="{{isset($atleta->apellido_2)? ($atleta->apellido_2): old('nombre')}}" placeholder="Segundo apellido" autocomplete="apellido_2" autofocus>
        @error('apellido_2')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-5" role="alert">Buscar</button>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    

        <button type="submit" class="bg-gray-100 inline hover:bg-gray-300 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10" >Buscar</button>
    </form>
</div>