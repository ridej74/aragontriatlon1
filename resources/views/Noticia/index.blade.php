@extends('layouts.app')

@section('navegacion')
@include('ui.noticianav')
@endsection

@section('content')
    <div class="container mx-auto mt-5 text-center">
        <h1 class="mt-5 text-white text-2xl text-center uppercase font-bold p-3 bg-gray-700">{{__('Listado de entrada de noticias')}}</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('ID')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Titulo')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Autor')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Alta')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Acciones')}}
                    </th>  
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($noticias as $noticia)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{$noticia->id}}</div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{$noticia->titulo}}</div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{$noticia->user->name}}</div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{$noticia->created_at->format('d/m/Y')}}</div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <a href="" class="text-blue-400 text-sm hover:underline">{{ __('Editar') }} |</a>
                        <a href="#" onclick="event.preventDefault();document.getElementById('delete-noticia-{{$noticia->id}}-form').submit()" class="text-red-400 text-sm hover:underline">Eliminar</a>
                        <form method="POST" action="" id="delete-noticia-{{$noticia->id}}-form" class="hidden">
                            @method('DELETE')
                            @csrf
                        </form>   
                @empty

                <td class="px-6 whitespace-no-wrap text-center" colspan="5">
                    <div class="leading-5 text-gray-900">No hay registros</div>
                </td>

                @endforelse
            </tbody>
        </table>
    </div>

    @if($noticias->count())
    <div class="text-yellow mt-3">
        {{$noticias->links()}}
    </div>
    @endif
@endsection