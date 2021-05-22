@extends('layouts.app')

@section('styles')

@section('navegacion')
  <div class="mx-auto flex items-center justify-between p-4 pb-0 shadow-lg ">
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
        <a href="{{route('tiempos_clasificaciones')}}">
            Clasificaciones y tiempos
        </a>
      </button>
      <button class="md:inline mb-4 md:mb-2 bg-transparent text-black p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
        <a href="{{route('carreras_clasificaciones')}}">
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
      <div class="px-6 py-4">
        
        <div class="font-bold text-xl rounded-t-lg text-center bg-gray-700 text-white p-5 ">{{$carrera->nombre}}</div>
          <p class="text-gray-700 border rounded-t-lg border-gray-900 text-base mt-4">
            <h3 class="px-10 pt-2 font-bold text-xl my-2">Modalidad: </h3><p class="px-10"> {{$carrera->modalidad}}</p>
          </p>
        </div>
        
        <div class="px-16 pt-2 pb-2 justify-items-stretch">
          <h3 class="font-bold text-xl my-2">Competición: </h3>  {{$carrera->competicion}}
        </div>
        
        <div class="px-16 pt-4 pb-2 justify-items-stretch">
          <h3 class="font-bold text-xl my-2">Localidad: </h3> {{$carrera->localidad}} ({{$carrera->provincia}})
        </div>

        <div class="px-16 pt-4 pb-2 justify-items-stretch">
          <h3 class="font-bold text-xl my-2">Fecha: </h3>{{ date('d-m-Y', strtotime($carrera->fecha)) .': '}}
        </div>

        <div class="px-14 pt-4 pb-2 justify-items-center">
          <Table class="border rounded-t-lg border-gray-500">
            <caption class="border rounded-t-lg border-gray-500 font-bold text-xl text-center text-white p-3 bg-gray-700">Distancias Carrera <br>(en Km)</caption>
            <tr class="bg-gray-50">
              <th class="border border-gray-500 p-3">Sector 1</th>
              <th class="border border-gray-500 p-3">Sector 2</th>
              <th class="border border-gray-500 p-3">Sector 3</th>
            </tr>
            <tr>
              <td class="text-center border rounded-bl-lg border-gray-500 p-3">{{$carrera->distancia_1}}</td>
              <td class="text-center border border-gray-500  p-3">{{$carrera->distancia_2}}</td>
              <td class="text-center border rounded-br-lg border-gray-500 p-3">{{$carrera->distancia_3}}</td>
            </tr>
          </Table>
        </div>

        <div class="px-16 pt-4 pb-2 justify-items-stretch">
          <h3 class="font-bold text-xl my-2">Juez árbitro: </h3><p class="mb-5">{{$carrera->juez_arbitro}}<p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection