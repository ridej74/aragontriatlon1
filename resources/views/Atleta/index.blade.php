@extends('layouts.app')
@section('content')
<div class="flex justify center flex-wrap bg-gray-200 p-4 mt-5">
    <div class="text-center">
        <h1 class="mb-5">{{__('Listado de entrada de noticias')}}</h1>
        <a href="{{route('Noticias.create')}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover: ">
            {{__('Nueva Noticia')}}</a>
    </div>
</div>
<div class="container mx-auto mt-20 text-center">
    <table class="min-w-full divide-y divide-gray-200 border border-black">
        <thead>
            <th
                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-w">
                {{__('ID')}}
            </th>   
            <th
                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-w">
                {{__('Nombre')}}
            </th>   
            <th
                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-w">
                {{__('Apellidos')}}
            </th>   
            <th
                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-w">
                {{__('Sexo')}}
            </th>  
            <th
                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-w">
                {{__('Alta')}}
            </th>   <th
                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-w">
                {{__('Acciones')}}
            </th>   
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($noticias as $noticia)
            <tr>
                <td class="px-6 whitespace-no-wrap">
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
<div class="mt-3">
    {{$noticias->links()}}
</div>
@endif
@endsection