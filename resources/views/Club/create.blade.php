@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.clubcreatenav')
@endsection

@section('content')
<div class="bg-white my-5">
    <div class="box-border border-4 bg-gray-200 m-auto max-w-lg p-5">
        <h1 class="text-2xl text-white bg-gray-700 text-center p-5 border border-line mx-auto max-w-lg">Nuevo Club</h1>
            <form method="POST" action="{{route('Clubs.store')}}" class="max-w-lg mx-auto my-5" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="nombre" class="block text-gray-700 text-sm mb-2">Nombre Club:</label>
                    <input id="nombre" type="text" class="p-3 bg-white rounded form-input w-full @error('nombre') is-invalid @enderror" name="nombre" placeholder="obligatorio" autocomplete="nombre" autofocus>
                    @error('nombre')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    {{--<label for="direccion" class="mt-5 block text-gray-700 text-sm mb-2">Direccion Club:</label>
                    <input id="direccion" value="{{old('direccion')}}" type="hidden" class="p-3 bg-white rounded form-input w-full @error('direccion') is-invalid @enderror" name="direccion">
                    <trix-editor class="p-3 bg-white" input = "direccion" > </trix-editor > 
                    @error('direccion')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror--}}
                     <label for="direccion" class="block text-gray-700 text-sm mb-2 mt-5">Direccion Club:</label>
                    <input id="direccion" type="text" class="p-3 bg-white rounded form-input w-full @error('direccion') is-invalid @enderror" name="direccion" placeholder="opcional" autocomplete="direccion" autofocus>
                    @error('direccion')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 

                    <label for="telefono/s" class="block text-gray-700 text-sm mb-2 mt-5">Telefono/s Club:</label>
                    <input id="telefono/s" type="text" class="p-3 bg-white rounded form-input w-full @error('telefono/s') is-invalid @enderror" name="telefono/s" placeholder="opcional (separar los tfnos. con espacio en blanco)" autocomplete="direccion" autofocus>
                    @error('telefono/s')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="http" class="block text-gray-700 text-sm mb-2 mt-5">Direccion Web Club:</label>
                    <input id="http" type="text" class="p-3 bg-white rounded form-input w-full @error('http') is-invalid @enderror" name="http" placeholder="opcional" autocomplete="http" autofocus>
                    @error('http')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="mail" class="block text-gray-700 text-sm mb-2 mt-5">Mail Club:</label>
                    <input id="mail" type="text" class="p-3 bg-white rounded form-input w-full @error('mail') is-invalid @enderror" name="mail" placeholder="opcional" autocomplete="mail" autofocus>
                    @error('mail')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="facebook" class="block text-gray-700 text-sm mb-2 mt-5">Facebook Club:</label>
                    <input id="facebook" type="text" class="p-3 bg-white rounded form-input w-full @error('facebook') is-invalid @enderror" name="facebook" placeholder="opcional" autocomplete="facebook" autofocus>
                    @error('facebook')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <label for="descripcion" class="mt-5 block text-gray-700 text-sm mb-2">Descripcion Club:</label>
                    <input id="descripcion" value="{{old('descripcion')}}" type="hidden" class="p-3 bg-white rounded form-input w-full @error('descripcion') is-invalid @enderror" name="descripcion">
                    <trix-editor class="p-3 bg-white" input = "descripcion" > </trix-editor > 
                    @error('descripcion')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                    
                    <label for="logo" class="mt-5 block text-gray-700 text-sm mb-2">Logo Club:</label>
                    <input id="logo" accept="image/*" type="file" class="p-3 bg-white rounded form-input w-full @error('logo') is-invalid @enderror" name="logo" placeholder="obligatorio" autocomplete="logo" autofocus>
                    @error('imagen')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="mt-10 p-3 bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold focus:outline focus:shadow-outline uppercase">Agregar Club</button>
                </div>

            </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', ()=>{   
         const editor = new MediumEditor ('.editable', {
             toolbar:{
                 buttons: ['bold','italic','undeline','quote','anchor','justifyLeft','justifyCenter','justifyRight','justifyFull', 'orderedList','unorderedList','h2','h3'],
                 static:true,
                 sticky:true
             }
         });
    })
</script>
@endsection