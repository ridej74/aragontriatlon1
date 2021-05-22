@extends('layouts.app')

@section('styles')
@section('navegacion')
<div class="mx-auto flex items-center justify-between p-4 shadow-lg">
    <!-- Logo text or image -->
    <div class="mb-4 md:mb-0">
    <h1 class="leading-none text-2xl text-black">
        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/image.png')}}"/>
    
        @if (Auth::check())
            <a class="inline text-2xl no-underline hover:text-teal-600 px-3" href="{{route('admin')}}">
                {{ config('app.name','AragonTriatlon')}}
            </a>
        @else
            <a class="inline text-2xl no-underline hover:text-teal-600 px-3" href="{{route('invitado')}}">
                {{ config('app.name','AragonTriatlon')}}
            </a>
        @endif

    </h1>

    </div>
    <!-- END Logo text or image -->
    
    <!-- Global navigation -->
    <nav class="md:inline">
        <button class="md:inline mb-4 md:mb-2 bg-transparent text-black p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
            <a href="{{route('noticias')}}">
                Volver
            </a>
        </button>
    </nav>   
</div>
@endsection

@section('content')

<!-- component -->
<!-- This is an example component -->
<div class="m-auto px-4 py-8 max-w-xl">
    <div class="bg-white p-3 rounded shadow-2xl" >
        <div>
            <img class="w-full" src="{{asset('storage/uploads/uploads-noticias/'.$noticias->id.'.jpg')}}">
        </div>
        <div class="px-4 py-2 mt-2 bg-white">
            <h2 class="font-bold text-2xl text-gray-800"><h2 class="font-bold text-2xl text-gray-800">{{$noticias->titulo}}</h2></h2>
                <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora reiciendis ad architecto at aut placeat quia, minus dolor praesentium officia maxime deserunt porro amet ab debitis deleniti modi soluta similique...
                </p>
            <div class="user flex items-center -ml-3 mt-8 mb-4">
                <span class="pl-40 font-bold">Autor: </span><p class="p-2"> {{$noticias->user->name}}</p>        
            </div>
        </div>
    </div>
</div>


  @endsection