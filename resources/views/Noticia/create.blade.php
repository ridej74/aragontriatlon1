@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.noticiacreatenav')
@endsection

@section('content')
<div class="bg-white my-5">
    <div class="box-border border-4 bg-gray-200 m-auto max-w-lg p-5">
        <h1 class="text-2xl text-white bg-gray-700 text-center p-5 border border-line mx-auto max-w-lg">Nueva Noticia</h1>
            <form method="POST" action="{{route('Noticias.store')}}" class="max-w-lg mx-auto my-5" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Noticia:</label>
                    <input id="titulo" type="text" class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo" autocomplete="titulo" autofocus>
                    @error('titulo')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="descripcion" class="mt-5 block text-gray-700 text-sm mb-2">Descripcion Noticia:</label>
                    <input id="descripcion" value="{{old('descripcion')}}" type="hidden" class="p-3 bg--white rounded form-input w-full @error('descripcion') is-invalid @enderror" name="descripcion">
                    <trix-editor class="p-3 bg-white" input = "descripcion" > </trix-editor > 
                    @error('descripcion')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <label for="imagen" class="mt-5 block text-gray-700 text-sm mb-2">Imagenes:</label>
                    <input id="imagen" type="file" class="p-3 bg-white rounded form-input w-full @error('imagen') is-invalid @enderror" name="imagen" autocomplete="imagen" autofocus>
                    @error('imagen')
                        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="mt-10 p-3 bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold focus:outline focus:shadow-outline uppercase">Publicar Noticia</button>
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