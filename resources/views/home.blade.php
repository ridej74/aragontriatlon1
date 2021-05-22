@extends('layouts.app')

@section('navegacion')
    @include('ui.menu')
@endsection
@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

<div class="bg-gradient-to-br from-blue-900 to-blue-100 min-h-screen overflow-auto">
    <div class="container max-w-5xl mx-auto px-4">
        <div class="w-4/5">
            <h1 class="mt-20 mb-6 text-white text-6xl font-bold">Federación Aragonesa de Triatlón.<br /><span class="text-indigo-900">Menú de Administración</span></h1>
        </div>
        <div class="w-5/6 my-10 ml-6">
            <h3 class="text-gray-300">
                Crear, ver, editar y eliminar <br />
                <strong class="text-white">registros de la base de datos</strong>
                <br />AragonTriatlon.
            </h3>
        </div>
        <div class="hidden sm:block opacity-50 z-0">
            <div class="shadow-2xl w-96 h-96 rounded-full -mt-72"></div>
            <div class="shadow-2xl w-96 h-96 rounded-full -mt-96"></div>
            <div class="shadow-xl w-80 h-80 rounded-full ml-8 -mt-96"></div>
        </div>
        <div class="text-white relative">
            <h3 class="text-uppercase font-semibold">Opciones</h3>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 sm:gap-5 uppercase">
                <a href="{{route('Atletas.index')}}">
                    <div class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-5 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                        <img class="w-9" src="{{asset('storage/uploads/icons-app/atletas.png')}}" style="height:100px; width:100px;" alt=""/>
                        <div>
                            <span class="text-xl">Atletas</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                    </div>
                </a>
                <a href="{{route('Clubs.index')}}">
                    <div class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-7 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                        <img class="w-9" src="{{asset('storage/uploads/icons-app/clubes.png')}}" style="height:80px; width:80px;" alt=""/>
                        <div>
                            <span class="pl-2 text-xl">Clubes</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                    </div>
                </a>
                <a href="{{route('Carreras.index')}}">
                    <div class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-7 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                    <img class="w-9" src="{{asset('storage/uploads/icons-app/carreras.png')}}" style="height:80px; width:80px;" alt=""/>
                    <div>
                        <span class="pl-2 text-xl">Carreras</span> 
                    </div>
                    <div>
                        <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                    </div>
                    </div>
                </a>
                
                <a href="{{route('Noticias.index')}}">
                    <div class="group flex items-center bg-indigo-900 bg-opacity-40 shadow-xl gap-5 px-6 py-7 rounded-lg ring-2 ring-offset-2 ring-offset-blue-800 ring-cyan-700 mt-5 cursor-pointer hover:bg-blue-900 hover:bg-opacity-100 transition">
                        <img class="w-9" src="{{asset('storage/uploads/icons-app/noticias.png')}}" style="height:80px; width:80px;" alt=""/>
                        <div>
                            <span class="text-xl pl-2">Noticias</span>
                        </div>
                        <div>
                            <i class="fa fa-chevron-right opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 block transition"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection