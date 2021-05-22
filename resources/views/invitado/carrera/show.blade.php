@extends('layouts.app')

@section('styles')

@section('navegacion')
  @include('ui.menu2')  
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