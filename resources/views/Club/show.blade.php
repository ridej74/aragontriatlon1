@extends('layouts.app')

@section('styles')
@section('navegacion')
    <div class="mx-auto flex items-center justify-between p-4 pb-0 shadow-lg">
        <!-- Logo text or image -->
        <div class="mb-4 md:mb-0">
        <h1 class="leading-none text-2xl text-black">
            <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/image.png')}}"/>
        
            <a class="inline text-2xl no-underline hover:text-teal-600 px-3" href="{{route('admin')}}">
                {{ config('app.name','AragonTriatlon')}}
            </a>
        </h1>

        </div>
        <!-- END Logo text or image -->
        
        <!-- Global navigation -->
        <nav class="md:inline">
            <button class="md:inline mb-4 md:mb-2 bg-transparent text-black p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                <a href="{{route('clubes')}}">
                Volver
                </a>
            </button>
        </nav>   
    </div>
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