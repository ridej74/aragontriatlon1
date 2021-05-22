@extends('layouts.app')

@section('styles')

@section('navegacion')
    @include('ui.menu')
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
<div class="container mx-auto p-4">
    <div class="flex items-center justify-center ">
        <div class="max-w-sm mt-3 rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{asset('storage/uploads/uploads-club/'.$club->id.'.jpg')}}" alt="" width="400">
            <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$club->nombre}}</div>
            <p class="text-gray-700 text-base mt-4">
            {{$club->direccion}}
            </p>
            </div>
            
            <div class="px-6 pt-4 pb-2 justify-items-stretch">
                <p class="flex items-center justify-self-auto overflow-y-auto"><img class="mr-4 " width="25" src="{{asset('storage/uploads/icons-app/tfno.svg')}}"/><span class=" bg-gray-200 rounded-full  px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 ">{{$club->telefonos}}</span></p>
                <p class="flex items-center justify-self-auto overflow-y-auto"><img class="mr-4 mt-3" width="25" src="{{asset('storage/uploads/icons-app/mail.jpg')}}"/><span class="bg-gray-200 rounded-full px-3 mt-5 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 ">{{$club->mail}}</span></p>
                <p class="flex items-center justify-self-auto overflow-y-auto"><img class="mr-4 mt-3" width="27" src="{{asset('storage/uploads/icons-app/facebook.jpg')}}"/><span class="bg-gray-200 rounded-full px-3 mt-5  py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 "><a href="{{$club->facebook}}">{{$club->facebook}}</a></span></p>
            </div>
        </div>
    </div>
</div>
  @endsection