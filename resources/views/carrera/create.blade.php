@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.carreracreatenav')
@endsection

@section('content')
<div class="bg-white my-5">
    <div class="box-border border-4 bg-gray-200 m-auto max-w-lg p-5">
        <h1 class="text-2xl text-white bg-gray-700 text-center p-5 border border-line mx-auto max-w-lg">Nueva Carrera</h1>
            <form method="POST" action="{{route('Carreras.store')}}" class="max-w-lg mx-auto my-5" novalidate>
                @csrf
                @include('carrera.form',['modo'=>'Crear'])
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