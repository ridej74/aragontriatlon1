@if(count($errors)>0)
<div class="bg-red-100 mb-3 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
   <ul>
        @foreach ($errors->all() as $error)
            <li class="m-2" >{{ $error }}</li>
        @endforeach
   </ul>
</div>
@endif
<div class="mb-5">
<label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Noticia:</label>
<input id="titulo" type="text" class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo" value="{{isset($noticia->titulo)? ($noticia->titulo): old('titulo')}}" placeholder="obligatorio" autocomplete="titulo" autofocus>
@error('titulo')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<label for="descripcion" class="block text-gray-700 text-sm mb-2 mt-5">Descripción de la Noticia:</label>
<input id="descripcion" type="text" class="p-3 bg-white rounded form-input w-full @error('descripcion') is-invalid @enderror" name="descripcion" value="{{isset($noticia->descripcion)? $noticia->descripcion: old('descripcion')}}" placeholder="opcional" autocomplete="descripcion" autofocus>
@error('descripcion')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror 

<label for="imagen" class="block text-gray-700 text-sm mb-2 mt-5">Imagen:</label>
<input id="imagen" type="text" class="p-3 bg-white rounded form-input w-full @error('imagen') is-invalid @enderror" name="imagen" value="{{isset($noticia->imagen)? ($noticia->imagen):old('imagen') }}" placeholder="opcional" autocomplete="direccion" autofocus>
@error('imagen')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>  
</span>
@enderror

<label for="http" class="block text-gray-700 text-sm mb-2 mt-5">Direccion Web Club:</label>
<input id="http" type="text" class="p-3 bg-white rounded form-input w-full @error('http') is-invalid @enderror" name="http" value="{{isset($club->http)? ($club->http): old('http')}}" placeholder="opcional" autocomplete="http" autofocus>
@error('http')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<label for="mail" class="block text-gray-700 text-sm mb-2 mt-5">Mail Club:</label>
<input id="mail" type="text" class="p-3 bg-white rounded form-input w-full @error('mail') is-invalid @enderror" name="mail" value="{{isset($club->mail)?($club->mail):old('mail')}}" placeholder="opcional" autocomplete="mail" autofocus>
@error('mail')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<label for="facebook" class="block text-gray-700 text-sm mb-2 mt-5">Facebook Club:</label>
<input id="facebook" type="text" class="p-3 bg-white rounded form-input w-full @error('facebook') is-invalid @enderror" name="facebook" value="{{isset($club->facebook)? ($club->facebook): old('facebook')}}" placeholder="opcional" autocomplete="facebook" autofocus>
@error('facebook')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<label for="logo" class="mt-5 block text-gray-700 text-sm mb-2">Logo Club:</label>
{{isset($club->logo)?($club->logo):old('logo')}}
<input id="logo" accept="image/*" type="file" class="p-3 bg-white rounded form-input w-full @error('logo') is-invalid @enderror" name="logo" value="" placeholder="obligatorio" autocomplete="logo" autofocus>
@error('logo')
<span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<button type="submit" class="mt-10 p-3 bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold focus:outline focus:shadow-outline uppercase">{{$modo}} Club</button>
</div>