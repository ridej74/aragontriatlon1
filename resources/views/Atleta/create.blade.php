@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.menu1')
@endsection

@section('content')
<div class="content w-auto h-auto mt-5"> 
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="border-blue-700 overflow-hidden sm:rounded-lg">
                    <h1 class="text-2xl text-center p-5 border border-line mx-auto max-w-lg">Nuevo Atleta</h1>
                    <form method="POST" action="{{route('Atletas.store')}}" class="max-w-lg mx-auto my-5" novalidate>
                        @csrf
                        @include('atleta.form',['modo'=>'Crear'])
                    </form>
                </div>
            </div>
        </div>
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