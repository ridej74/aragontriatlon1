@extends('layouts.app')

@section('styles')
@section('navegacion')
    @include('ui.menu1')
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
<div class="container mx-auto ">
    <div class="flex items-center justify-center ">
        <div class="p-4 max-w-md mt-3 bg-blue-10 rounded overflow-hidden shadow-lg">   
             <div class="inline-flex items-center bg-blue-10 shadow-lg px-6 py-4">
                <img class="inline-flex" src="{{asset('storage/uploads/uploads-club/'.$club->id.'.jpg')}}" alt="" style="width:100px">
                <div class="m-3 p-3 text-blue-700 font-bold inline text-xl mb-2">{{$club->nombre}}
            </div>          
        </div>
        <div class="flex flex-col mt-3 p-5 shadow-lg bg-blue-10 text-xl">
            <b class="leading-5 mb-2 text-center text-3xl">  {{$busquedas->count()}} Atletas</b>
            <span class="text-center"> Copa Aragonesa de Triatlón 2019</span>          
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <table class="min-w-full mt-5 divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <th scope="col" class="px-6 py-3 text-center font-medium text-gray-800 uppercase tracking-wider">
                                    {{__('Atleta')}}
                                </th>
                                <th scope="col" class="px-6 py-3 tracking-wider">
                                    
                                </th>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($busquedas as $busqueda)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">  
                                            {{$busqueda->nombre}} {{$busqueda->apellido_1}} {{$busqueda->apellido_2}} 
                                        </td>    
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form action="{{route('atletas_vista',$busqueda->id)}}">  
                                                <button type="submit" class=" bg-transparent hover:bg-yellow-200 text-yellow-500 font-semibold hover:text-yellow-900 py-1 px-3 border border-yellow-900 hover:border-transparent rounded">     
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
        </div>
    </div>
</div>
  @endsection