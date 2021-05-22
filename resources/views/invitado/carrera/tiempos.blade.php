@extends('layouts.app')

@section('navegacion')
    @include('ui.menu3')
 


@endsection

@section('content')

    <div class="container mx-auto mt-5 text-center">
        @if(Session::has('mensaje'))
            <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-center w-12 bg-green-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                    </svg>
                </div>
                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        
                        <p class="font-bold">
                        <span class="font-semibold text-green-500 dark:text-green-400">Todo correcto</span><br>
                                {{Session::get('mensaje')}}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="content mx-20 "> 
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <h1 class="mt-5 text-center text-3xl uppercase mb-5 p-3">{{__('Listado de Tiempos y Posiciones')}}</h1>                                  
                        <!-- componente -->
                        <div class="flex items-center px-4">
                            <div class='overflow-x-auto w-full'>
                                <!-- Table -->
                                <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                                    <thead class="bg-gray-50">
                                        <tr class="text-gray-600 text-center">
                                            <th class="font-semibold text-sm uppercase px-4 py-4">
                                                {{__('atleta_id')}}
                                            </th>
                                            <th class="font-semibold text-sm uppercase px-4 py-4 text-center">
                                                {{__('Categoria')}}
                                            </th>
                                            <th class="font-semibold text-sm uppercase px-4 py-4">
                                                {{__('Tiempo Sector 1')}}
                                            </th>
                                            <th class="font-semibold text-sm uppercase px-4 py-4 text-center">
                                                {{__('Tiempo Sector 2')}}
                                            </th>
                                            <th class="font-semibold text-sm uppercase px-4 py-4 text-center">
                                                {{__('Tiempo sector 3')}}
                                            </th>
                                            <th class="font-semibold text-sm uppercase px-4 py-4 text-center">
                                                {{__('Posicion Total')}}
                                            </th>
                                            <th class="font-semibold text-sm uppercase px-4 py-4 text-center">
                                                {{__('Posicion Categoria')}}
                                            </th>
                                            <th class="font-semibold text-sm uppercase px-4 py-4 text-center">
                                                {{__('Puntos')}}
                                            </th>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 text-center">
                                    
                                        @foreach($clases as $clase)     
                                            <tr>
                                                <td class="px-4 py-4">
                                                    {{$clase->nombre}} {{$clase->apellido_1}} {{$clase->apellido_2}}
                                                    
                                                </td>
                                                <td class="px-4 py-4">
                                                    {{$clase->pivot->categoria}}
                                                </td>
                                                <td class="px-4 py-4 text-center">
                                                    {{$clase->pivot->tiempo_1}}
                                                </td>
                                                <td class="px-4 py-4 text-center">
                                                    {{$clase->pivot->tiempo_2}}
                                                </td>
                                                <td class="px-4 py-4">
                                                    {{$clase->pivot->tiempo_3}}
                                                </td>
                                                <td class="px-4 py-4 text-center">
                                                    {{$clase->pivot->posicion_total}}
                                                </td>
                                                <td class="px-4 py-4 text-center">
                                                    {{$clase->pivot->posicion_categoria}}
                                                </td>
                                                </td>
                                                <td class="px-4 py-4 text-center">
                                                    {{$clase->pivot->puntos}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

@endsection

