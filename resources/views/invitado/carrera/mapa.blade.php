@extends('layouts.app')

@section('styles')
@endsection
<link rel="stylesheet" 
      href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
      integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
      crossorigin=""/>
@section('navegacion')
  @include('ui.menu1')
@endsection

@section('content')
<div class="container mx-auto mt-5 shadow-lg">
  <section>
    <div class=" text-indigo-900 py-8">
      <div class="container mx-auto flex flex-col items-start md:flex-row my-12 md:my-24">

        <div class="flex flex-col w-full sticky md:top-36 lg:w-1/3 mt-2 px-8">
          <p>
            <img class="mx-auto bg-transparent" src="{{asset('storage/uploads/icons-app/copaaragonesatriatlon.jpg')}}" style="height:150px; " />
          </p>
          <p class="ml-2 text-gray-700 uppercase tracking-loose">Carreras</p>
          <p class="text-3xl md:text-4xl leading-normal md:leading-relaxed mb-2">Copa aragonesa de triatlón</p>
          <p class="text-sm md:text-base  mb-4">
            Ubicación carreras de la Copa aragonesa de triatlón de la temporada 2019/2020. 
          </p>
          
          <div class="rounded-md border-gray-300" style="height: 40%" id="mapid"></div>
          

          <a href="{{route('carreras_clasificaciones')}}"
          class="bg-transparent mr-auto hover:bg-gray-300 text-indigo-900 hover:text-black rounded shadow hover:shadow-lg py-2 px-4 border border-gray-300 hover:border-transparent">
          Volver al listado</a>
          
        </div>
        <div class="ml-0 md:ml-5 lg:w-2/3 sticky">
          <div class="container mx-auto w-full h-full">
            <div class="relative wrap overflow-hidden p-10 h-full">
              <div class="border-2-2 border-yellow-555 absolute h-full border"
                style="right: 50%; border: 2px solid indigo; border-radius: 1%;"></div>
                <div class="border-2-2 border-yellow-555 absolute h-full border"
                style="left: 50%; border: 2px solid indigo; border-radius: 1%;"></div>
                @foreach($pruebas as $prueba)     
                  @if(($prueba->id)%2==0)                
                      <div class="mb-3 flex justify-between  flex-row-reverse items-center w-full left-timeline">
                        <div class="order-1 w-5/12"></div>
                        <div class="order-1 w-5/12 pl-1 pr-4 py-2 bg-gray-50 text-right">
                          <p class="mb-3 text-base font-bold text-indigo-900">{{ date('d-m-Y', strtotime($prueba->fecha)) .': '}}</p>
                          <h4 class="mb-3 font-bold text-lg md:text-2xl">{{$prueba->nombre}}</h4>
                          <p class="text-sm md:text-base leading-snug text-indigo-500 text-opacity-100">
                            {{$prueba->localidad}} ({{$prueba->provincia}})
                          </p>
                        </div>
                      </div>                  
                  @else                   
                      <div class="mb-3 flex justify-between items-center w-full right-timeline">
                        <div class="order-1 w-5/12"></div>
                        <div class="order-1  w-5/12 px-1 py-2 text-left">
                          <p class="mb-3 text-base font-bold text-indigo-900">{{ date('d-m-Y', strtotime($prueba->fecha)) .': '}}</p>
                          <h4 class="mb-3 font-bold text-lg md:text-2xl">{{$prueba->nombre}}</h4>
                          <p class="text-sm md:text-base leading-snug text-indigo-500 text-opacity-100">
                            {{$prueba->localidad}} ({{$prueba->provincia}}) 
                          </p>
                        </div>
                      </div>
                  @endif  
                @endforeach           
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>
<script>
  var mymap = L.map('mapid').setView([42, -0.7], 7);
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 10,
    attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>', 
    id: 'mapbox/streets-v11'
}).addTo(mymap);

  
  L.control.scale().addTo(mymap);
  L.marker([48.808838592146165, -0.9987159940408291], {draggable: true}).addTo(mymap); //Utebo

  L.marker([42.752297651618214, -0.5147080815434377], {draggable: true}).addTo(mymap); //Canfranc estación
  
  L.marker([41.05127543046629, -0.13407018001429638], {draggable: true}).addTo(mymap); //Alcañiz

  L.marker([41.613011175868444, -0.7051339577785283], {draggable: true}).addTo(mymap); //Alfajarin

  L.marker([41.8389445079645, -1.176556729120387], {draggable: true}).addTo(mymap); //Remolinos

  L.marker([41.91344099061638, 0.19094767739248936], {draggable: true}).addTo(mymap); //Monzon

  L.marker([41.69270009521435, 0.17917437224015645], {draggable: true}).addTo(mymap); //Belver de Cinca

  L.marker([41.35280371486268, -1.64414835394676], {draggable: true}).addTo(mymap); //Calatayud

</script>    
@endsection
  