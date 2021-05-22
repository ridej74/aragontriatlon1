
<div class="flex justify-between items-center mb-5 ">
    <form action={{route('carreras.buscar')}} method="POST">
        @csrf
        <label for="buscar" class="inline text-gray-700 text-2xl">Buscar carrera:</label>
        <input id="localidad" type="text" class="inline p-3 bg-white rounded form-input  @error('localidad') is-invalid @enderror" name="localidad" value="{{isset($carrera->localidad)? ($carrera->localidad): old('localidad')}}" placeholder="Localidad" autocomplete="nombre" autofocus>
        @error('localidad')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4  mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
        <input id="provincia" type="text" class="inline p-3 bg-white rounded form-input  @error('provincia') is-invalid @enderror" name="provincia" value="{{isset($carrera->provincia)? ($carrera->provincia): old('provincia')}}" placeholder="Provincia" autocomplete="provincia" autofocus>
        @error('provincia')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-5" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="fecha" type="text" class="inline p-3 bg-white rounded form-input  @error('fecha') is-invalid @enderror" name="fecha" value="{{isset($carrera->fecha)? ($carrera->fecha): old('fecha')}}" placeholder="Fecha" autocomplete="fecha" autofocus>
        @error('fecha')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mt-5" role="alert">Buscar</button>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    

        <button type="submit" class="bg-gray-100 inline hover:bg-gray-300 font-bold p-3 focus:outline-none focus:shadow-outline uppercase mt-10" >Buscar</button>
    </form>
</div>