@extends('layouts.app_invitado')
@section('navegacion')
    @include('ui.menu')

    <div class="mx-auto border-b flex justify-center p-1 pb-3 shadow-lg">
    <div>
        @include('invitado.club.buscar')</div>
    </div>

@endsection


@section('content')
    <div class="overflow-auto sm:overflow-visible md:overflow-hidden lg:overflow-x-scroll xl:overflow-y-scroll ...">
        <div class="container mx-auto mt-5 text-center">
            @if(Session::has('mensaje'))
                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                        </svg>
                    </div>
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
        <div class="content mx-20 ">           
            <div class="flex flex-col">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <h1 class="mt-5 text-center text-3xl uppercase mb-5 p-3">{{__('Listado de entrada de Clubes')}}</h1>            
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{__('ID')}}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{__('NOMBRE')}}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{__('LOGO')}}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{__('ALTA')}}
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{__('Accion')}}
                                    </th>

                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($clubs as $club)  
                                        <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm text-center font-medium text-gray-900">
                                                    {{$club->id}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="text-sm font-medium text-center text-gray-900">
                                                {{$club->nombre}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-center text-gray-900">
                                                <img src="{{asset('storage/uploads/uploads-club/'.$club->id.'.jpg')}}" width="70" class="bg-green hover:underline"/>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-center text-gray-900">
                                                {{$club->created_at->format('d/m/Y')}} 
                                            </span>
                                        </td>

                                        <td class="flex flex-row justify-center px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <form action="{{route('clubes_vista',$club->id)}}">  
                                                <button type="submit" class="mr-2 bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-yellow-900 py-1 px-5 border border-yellow-900 hover:border-transparent rounded">     
                                                    +Info
                                                </button>
                                            </form>
                                            <form action="{{route('atletas_club',$club->id)}}">  
                                                <button type="submit" class="bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-yellow-900 py-1 px-3 border border-yellow-900 hover:border-transparent rounded">     
                                                    Atletas
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
            </div>
        </div>
        
    </div>
    @if($clubs ?? ''->count())
    <div class="text-yellow mt-3">
        {{$clubs ?? ''->links()}}
    </div>
    @endif
@endsection
