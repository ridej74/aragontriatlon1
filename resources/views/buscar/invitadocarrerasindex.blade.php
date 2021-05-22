@extends('layouts.app')

@section('navegacion')
    @include('ui.menu1')
@endsection

@section('content')
@if(count($carreras)>0)

<div class="overflow-auto sm:overflow-visible md:overflow-hidden lg:overflow-x-scroll xl:overflow-y-scroll ...">
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
            @endif
        </div>
        <div class="content mx-20 border-rounded border-gray-100 shadow-lg">

            
            <table class="min-w-full divide-y divide-gray-200">
                <caption><h1 class="mt-5 text-center text-xl md:text-3xl uppercase mb-5 p-3">{{__('Resultados Búsqueda Atletas')}}</h1> </caption>
                <thead class="bg-gray-100">
                    <tr><h3>
                        <th scope="col" width="40" class="px-6 py-3 text-center text-xl font-bold text-gray-500 uppercase tracking-wider">
                            {{__('ID')}}
                        </th>   
                        <th scope="col" width="100" class="px-6 py-3 text-center text-xl font-bold text-gray-500 uppercase tracking-wider">
                            {{__('Nombre')}}
                        </th>   
                        <th scope="col" width="80" class="pl-6 pr-1 py-3 text-center text-xl font-bold text-gray-500 uppercase tracking-wider">
                            {{__('Provincia')}}
                        </th>  
                    
                        <th scope="col" width="150" class="px-6 py-3 text-center text-xl font-bold text-gray-500 uppercase tracking-wider">
                            {{__('Fecha')}}
                        </th>   
                        <th scope="col" width="150" class="px-6 py-3 text-center text-xl font-bold text-gray-500 uppercase tracking-wider">
                            {{__('Acción')}}
                        </th>  
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm border ">
                    @foreach($carreras as $carrera)     
                    <tr>
                        <td width="40" class="px-2 py-1 whitespace-no-wrap">
                            <div class="text-sm text-center text-gray-900">{{$carrera->id}}</div>
                        </td>
                        <td width="100" class="px-2 whitespace-no-wrap">
                            <div class="text-sm text-center text-gray-900">{{$carrera->nombre}}</div>
                        </td>      
                        <td width="80" class="px-2 whitespace-no-wrap">
                            <div class="text-sm text-center text-gray-900">{{$carrera->provincia}}</div>
                        </td> 

                        <td width="150" class="px-2 whitespace-no-wrap">
                            <div class="text-sm text-center text-gray-900">{{$carrera->fecha}}</div>
                        </td>
                        
                        <td width="150" class="px-2 py-4 text-center  whitespace-no-wrap ">
                            <form action="{{route('Carreras.show',$carrera->id)}}">  
                                <button type="submit" class="bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-yellow-900 py-1 px-3 border border-yellow-900 hover:border-transparent rounded">     
                                    Ver
                                </button>
                            </form>   
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@else
    <div class="bg-red-50 p-4 rounded flex items-start text-red-600 my-4 shadow-lg mx-auto max-w-2xl">
        <div class="text-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg>
        </div>
        <div class=" px-3">
            <h3 class="text-red-800 font-semibold tracking-wider">
                No hay ningún resultado que cumpla con los criterios de búsqueda establecidos
            </h3>
            <ul class="mt-5 text center list-disc list-inside">
                Ingrese unos nuevos filtros de búsqueda
            </ul>
        </div>
    </div>

@endif


    

    @if($carreras ?? ''->count())
    <div class="text-yellow mt-3">
        {{$carreras ?? ''->links()}}
    </div>
    @endif
@endsection

