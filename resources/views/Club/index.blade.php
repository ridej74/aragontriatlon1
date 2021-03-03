@extends('layouts.app')

@section('navegacion')
@include('ui.clubnav')
@endsection

@section('content')
    <div class="container mx-auto mt-5 text-center">
        <h1 class="mt-5 text-white text-2xl text-center uppercase font-bold p-3 bg-gray-700">{{__('Listado de entrada de clubes')}}</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('ID')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Nombre')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Logo')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Alta')}}
                    </th>   
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{__('Acciones')}}
                    </th>  
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 border ">
                @forelse($clubs as $club)
                    
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{$club->id}}</div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{$club->nombre}}</div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                            <img src="{{asset('$club->logo')}}")/>
                        </div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">{{$club->created_at->format('d/m/Y')}}</div>
                    </td>
                    <td class="px-6 whitespace-no-wrap">
                        <a href="" class="text-blue-400 text-sm hover:underline">{{ __('Editar') }} |</a>
                        <a href="#" onclick="event.preventDefault();document.getElementById('delete-club-{{$club->id}}-form').submit()" class="text-red-400 text-sm hover:underline">Eliminar</a>
                        <form method="POST" action="" id="delete-club-{{$club->id}}-form" class="hidden">
                            @method('DELETE')
                            @csrf
                        </form>   
                    </td>
                </tr>
                @empty

                    <td class="px-6 whitespace-no-wrap text-center text-bold" colspan="5">
                        <div class="leading-5 m-40 text-2xl text-gray-500 font-bold ">No hay registros</div>
                    </td>

                @endforelse
            </tbody>
        </table>
    </div>

    @if($clubs ?? ''->count())
    <div class="text-yellow mt-3">
        {{$clubs ?? ''->links()}}
    </div>
    @endif
@endsection