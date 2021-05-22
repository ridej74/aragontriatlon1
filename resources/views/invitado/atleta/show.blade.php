@extends('layouts.app')

@section('styles')
@endsection

@section('navegacion')
    @include('ui.menu1')   
@endsection

@section('content')

<!-- component -->
<div class="max-xl-md w-full lg:flex">
    <div class="mt-4 mb-4 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" >
        <div class="ml-4 border-r border-b border-l border-grey-light lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="flex items-center justify-center">
                @foreach($pruebas as $prueba)
                    <div class="grid grid-cols-1 md:grid-cols-2 rounded rounded-t-lg shadow mb-5">
                        <!-- card -->
                    
                        <div class="rounded rounded-t-lg overflow-hidden md:rounded-none max-w-xs my-3">
                            <img src="{{asset('storage/uploads/icons-app/bandera.jpg')}}" class="w-full" />
                            <div class="flex justify-center -mt-8">
                                <img src="{{asset('storage/uploads/uploads-club/'.$prueba->id.'.jpg')}}" class="rounded-full border-solid border-white border-2 -mt-3">		
                            </div>
                            <div class="text-center px-3 pb-6 pt-2">
                                <h1 class="text-black text-sm bold font-6xl font-sans">{{$prueba->nombre}}</h1>
                            </div>
                        </div>  
                        <div class="rounded rounded-t-lg overflow-hidden max-w-xs my-3">
                            <h3 class="font-bold text-4xl m-2">{{$atleta->nombre}} {{$atleta->apellido_1}} {{$atleta->apellido_2}}</h3>
                            
                            <div class="text-center px-3 pt-2">
                                <h3 class="font-bold text-xl text-gray-500 md:text-3xl ">Sexo</h3>
                                <p class="ml-2 mb-5 text-xl md:text-2xl">
                                    @switch($atleta->sexo)
                                        @case('M')
                                            {{'Masculino'}}
                                            @break
                                        @default
                                            {{'Femenino'}}
                                            @break
                                    @endswitch
                                </p>	
                                <h3 class="font-bold text-xl text-gray-500 md:text-3xl ">Categoría</h3>
                                <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                    
                                    @foreach($clases as $clase)
                                
                                    @endforeach 

                                    @switch($clase->pivot->categoria)
                                        @case('ABSM')
                                            {{'Absoluta Masculino'}}
                                            @break
                                        @case('V1M')
                                            {{'Veterano 1 Masculino'}}
                                            @break
                                        @case('V2M')
                                            {{'Veterano 2 Masculino'}}
                                            @break
                                        @case('V3M')
                                            {{'Veterano 3 Masculino'}}
                                            @break
                                        @case('SUB23M')
                                            {{'SUB23 Masculino'}}
                                            @break
                                        @case('JNM')
                                            {{'Junior Masculino'}}
                                            @break
                                        @case('CDM')
                                            {{'Cadete Masculino'}}
                                            @break
                                        @case('JNF')
                                            {{'Junior Femenina'}}
                                            @break
                                        @case('ABSF')
                                            {{'Absoluta Femenina'}}
                                            @break
                                        @case('V1F')
                                            {{'Veterano 1 Femenina'}}
                                            @break
                                        @case('V2F')
                                            {{'Veterano 2 Femenina'}}
                                            @break
                                        @case('V3F')
                                            {{'Veterano 3 Femenina'}}
                                            @break
                                        @case('SUB23F')
                                            {{'SUB23 Femenina'}}
                                            @break
                                        @default
                                            {{'Cadete Femenina'}}
                                            @break
                                    @endswitch
                                </p>
                            </div>
                            <h3 class="font-bold text-xl md:text-3xl text-gray-500 ">Pruebas disputadas</h3>
                                <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                    {{$clases->count()}}
                                </p>
                            @php
                                $podios_categoria=0;
                                $podios_total=0;
                            @endphp
                            @foreach($clases as $clase)
                                @if($clase->pivot->posicion_categoria <= 3)
                                    @php
                                        $podios_categoria++;
                                    @endphp
                                @endif
                                @if($clase->pivot->posicion_total <= 3)
                                    @php
                                        $podios_total++;
                                    @endphp
                                @endif
                            @endforeach
                            <h3 class="font-bold text-xl md:text-3xl text-gray-500 ">Número de Podios en clasificación general</h3>
                                <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                    {{$podios_total}}
                                </p>
                            <h3 class="font-bold text-xl md:text-3xl text-gray-500">Número de Podios en su categoria</h3>
                                <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                    {{$podios_categoria}}
                                </p>
                        </div>        
                    </div>
                @endforeach
            </div>
            @php
                $podios_totales=0;
                $podios_categoria=0;
                $puntos=0;
                $i=0;
                $j=0;
                $array_pruebas=array();
                $array=array();
                $array[0]=0;
                $array[1]=0;
                $array[2]=0;
                $array[3]=0;
                $array[4]=0;
                $array[5]=0;
                $array[6]=0;
                $array[7]=0;
                $puntos_totales=0;
            @endphp
            @foreach($clases as $clase) 
                @php
                    $puntos_totales=$puntos_totales+$clase->pivot->puntos;
                    $array[($clase->id)-1]=$clase->pivot->puntos;
                @endphp
            @endforeach 
            @php
                $puntos_top6=0;
                rsort($array);
                for($k=0; $k<8; $k++){
                    if($k<6)
                        $puntos_top6=$puntos_top6+$array[$k];             
                }
            @endphp


            <div class="mx-auto bg-white border-2 border-gray-300 p-5 rounded-md tracking-wide shadow-lg">
                <div id="header" class="md:flex"> 
                    <img alt="ranking" class="mb-3 p-3 mx-auto md:align-items-center" src="{{asset('storage/uploads/icons-app/ranking.png')}}" style="height: 100px;" />
                    <div class="flex flex-col mb-3 p-3 md:ml-5 md:border md:border-gray-200">
                        <h4 class="text-xl font-semibold mb-2">Puntuación total</h4>
                        <p class="text-gray-800 text-2xl mt-1">{{$puntos_totales}}</p>
                    </div>
                    <div class="flex flex-col mb-3 p-3 md:ml-5 md:border md:border-gray-200">
                        <h4 class="text-xl font-semibold mb-2">Puntuación top6</h4>
                        <p class="text-gray-800 text-2xl mb-1">{{$puntos_top6}}</p>  
                    </div>
                </div>
            </div>


            <div class="flex items-center px-4">
                <div class='overflow-x-auto w-full'>
                    <h3 class="bg-white font-bold text-3xl m-2 shadow-lg">Pruebas y Puntuaciones</h3>
                    <!-- Table -->
                    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                        <thead class="bg-gray-50">
                            <tr class="text-gray-600 text-center">
                                <th class="font-semibold text-sm uppercase px-6 py-4">
                                    Prueba
                                </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4">
                                    Posicion General
                                </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                    Posicion Categoria
                                </th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                    Puntos
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            
                            @foreach($clases as $clase) 
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            {{$clase->nombre}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($clase->pivot->posicion_total <= 3)
                                                @php
                                                    $podios_totales++;
                                                @endphp
                                            @switch($clase->pivot->posicion_total)
                                                @case(1)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copaprimero.png')}}"/>
                        
                                                    @break
                                                @case(2)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copasegundo.png')}}"/>
                        
                                                    @break
                                                @case(3)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copatercero.png')}}"/>
                        
                                                @break
                                                @default
                                                    @break
                                            @endswitch
                                        @else
                                            {{$clase->pivot->posicion_total}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($clase->pivot->posicion_categoria <= 3)
                                            @php
                                                $podios_categoria++;
                                            @endphp
                                            @switch($clase->pivot->posicion_categoria)
                                                @case(1)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/primero.png')}}"/>
                        
                                                    @break
                                                @case(2)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/segundo.png')}}"/>
                        
                                                    @break
                                                @case(3)
                                                <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/tercero.png')}}"/>
                        
                                                @break
                                                @default
                                                    @break
                                            @endswitch
                                        @else
                                            {{$clase->pivot->posicion_categoria}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                                            @php
                                                $puntos_totales=$puntos_totales+$clase->pivot->puntos;
                                                $array[($clase->id)-1]=$clase->pivot->puntos;
                                            @endphp
                                            {{$clase->pivot->puntos}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>                      
        </div>
    
    </div>
    <div class="mt-4 mb-4 border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
      <div class="mb-8">
            <div class="rounded-md p-6 bg-white shadow">
                <div class="mb-2 pb-2">
                    <h3 class="font-semibold text-lg text-gray-600">Participaciones</h3>
                    <p class="text-sm text-gray-500">Porcentaje de carreras disputadas</p>
                </div>
                <div id="donutchart" style="width: 900px; height: 500px;"></div>
                <div id="line_top_x"></div>
                <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
            </div>             
        </div> 
       
      
    </div>
  </div>







    {{-- <div class="mt-4  bg-white antialiased leading-none font-sans">
        <div class="w-full justify-center lg:justify-self-center lg:flex">
            <div class="lg:h-auto lg:w-auto flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" >
                <div class="border-r border-b border-l border-grey-light lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="flex items-center justify-center">
                        @foreach($pruebas as $prueba)
                            <div class="grid grid-cols-1 md:grid-cols-2 rounded rounded-t-lg shadow mb-5">
                                <!-- card -->
                            
                                <div class="rounded rounded-t-lg overflow-hidden md:rounded-none max-w-xs my-3">
                                    <img src="{{asset('storage/uploads/icons-app/bandera.jpg')}}" class="w-full" />
                                    <div class="flex justify-center -mt-8">
                                        <img src="{{asset('storage/uploads/uploads-club/'.$prueba->id.'.jpg')}}" class="rounded-full border-solid border-white border-2 -mt-3">		
                                    </div>
                                    <div class="text-center px-3 pb-6 pt-2">
                                        <h1 class="text-black text-sm bold font-6xl font-sans">{{$prueba->nombre}}</h1>
                                    </div>
                                </div>  
                                <div class="rounded rounded-t-lg overflow-hidden max-w-xs my-3">
                                    <h3 class="font-bold text-4xl m-2">{{$atleta->nombre}} {{$atleta->apellido_1}} {{$atleta->apellido_2}}</h3>
                                    
                                    <div class="text-center px-3 pt-2">
                                        <h3 class="font-bold text-xl text-gray-500 md:text-3xl ">Sexo</h3>
                                        <p class="ml-2 mb-5 text-xl md:text-2xl">
                                            @switch($atleta->sexo)
                                                @case('M')
                                                    {{'Masculino'}}
                                                    @break
                                                @default
                                                    {{'Femenino'}}
                                                    @break
                                            @endswitch
                                        </p>	
                                        <h3 class="font-bold text-xl text-gray-500 md:text-3xl ">Categoría</h3>
                                        <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                            
                                            @foreach($clases as $clase)
                                        
                                            @endforeach 

                                            @switch($clase->pivot->categoria)
                                                @case('ABSM')
                                                    {{'Absoluta Masculino'}}
                                                    @break
                                                @case('V1M')
                                                    {{'Veterano 1 Masculino'}}
                                                    @break
                                                @case('V2M')
                                                    {{'Veterano 2 Masculino'}}
                                                    @break
                                                @case('V3M')
                                                    {{'Veterano 3 Masculino'}}
                                                    @break
                                                @case('SUB23M')
                                                    {{'SUB23 Masculino'}}
                                                    @break
                                                @case('JNM')
                                                    {{'Junior Masculino'}}
                                                    @break
                                                @case('CDM')
                                                    {{'Cadete Masculino'}}
                                                    @break
                                                @case('JNF')
                                                    {{'Junior Femenina'}}
                                                    @break
                                                @case('ABSF')
                                                    {{'Absoluta Femenina'}}
                                                    @break
                                                @case('V1F')
                                                    {{'Veterano 1 Femenina'}}
                                                    @break
                                                @case('V2F')
                                                    {{'Veterano 2 Femenina'}}
                                                    @break
                                                @case('V3F')
                                                    {{'Veterano 3 Femenina'}}
                                                    @break
                                                @case('SUB23F')
                                                    {{'SUB23 Femenina'}}
                                                    @break
                                                @default
                                                    {{'Cadete Femenina'}}
                                                    @break
                                            @endswitch
                                        </p>
                                    </div>
                                    <h3 class="font-bold text-xl md:text-3xl text-gray-500 ">Pruebas disputadas</h3>
                                        <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                            {{$clases->count()}}
                                        </p>
                                    @php
                                        $podios_categoria=0;
                                        $podios_total=0;
                                    @endphp
                                    @foreach($clases as $clase)
                                        @if($clase->pivot->posicion_categoria <= 3)
                                            @php
                                                $podios_categoria++;
                                            @endphp
                                        @endif
                                        @if($clase->pivot->posicion_total <= 3)
                                            @php
                                                $podios_total++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <h3 class="font-bold text-xl md:text-3xl text-gray-500 ">Número de Podios en clasificación general</h3>
                                        <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                            {{$podios_total}}
                                        </p>
                                    <h3 class="font-bold text-xl md:text-3xl text-gray-500">Número de Podios en su categoria</h3>
                                        <p class="ml-2 mb-5 text-xl md:text-2xl"> 
                                            {{$podios_categoria}}
                                        </p>
                                </div>        
                            </div>
                        @endforeach
                    </div>
                    @php
                        $podios_totales=0;
                        $podios_categoria=0;
                        $puntos=0;
                        $i=0;
                        $j=0;
                        $array_pruebas=array();
                        $array=array();
                        $array[0]=0;
                        $array[1]=0;
                        $array[2]=0;
                        $array[3]=0;
                        $array[4]=0;
                        $array[5]=0;
                        $array[6]=0;
                        $array[7]=0;
                        $puntos_totales=0;
                    @endphp
                    @foreach($clases as $clase) 
                        @php
                            $puntos_totales=$puntos_totales+$clase->pivot->puntos;
                            $array[($clase->id)-1]=$clase->pivot->puntos;
                        @endphp
                    @endforeach 
                    @php
                        $puntos_top6=0;
                        rsort($array);
                        for($k=0; $k<8; $k++){
                            if($k<6)
                                $puntos_top6=$puntos_top6+$array[$k];             
                        }
                    @endphp


                    <div class="max-w-2xl mx-auto bg-white border-2 border-gray-300 p-5 rounded-md tracking-wide shadow-lg">
                        <div id="header" class="md:flex"> 
                            <img alt="ranking" class="mb-3 p-3 mx-auto md:align-items-center" src="{{asset('storage/uploads/icons-app/ranking.png')}}" style="height: 100px;" />
                            <div class="flex flex-col mb-3 p-3 md:ml-5 md:border md:border-gray-200">
                                <h4 class="text-xl font-semibold mb-2">Puntuación total</h4>
                                <p class="text-gray-800 text-2xl mt-1">{{$puntos_totales}}</p>
                            </div>
                            <div class="flex flex-col mb-3 p-3 md:ml-5 md:border md:border-gray-200">
                                <h4 class="text-xl font-semibold mb-2">Puntuación top6</h4>
                                <p class="text-gray-800 text-2xl mb-1">{{$puntos_top6}}</p>  
                            </div>
                        </div>
                    </div>


                    <div class="flex items-center px-4">
                        <div class='overflow-x-auto w-full'>
                            <h3 class="bg-white font-bold text-3xl m-2 shadow-lg">Pruebas y Puntuaciones</h3>
                            <!-- Table -->
                            <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                                <thead class="bg-gray-50">
                                    <tr class="text-gray-600 text-center">
                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                            Prueba
                                        </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4">
                                            Posicion General
                                        </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                            Posicion Categoria
                                        </th>
                                        <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                                            Puntos
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    
                                    @foreach($clases as $clase) 
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center space-x-3">
                                                    {{$clase->nombre}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($clase->pivot->posicion_total <= 3)
                                                        @php
                                                            $podios_totales++;
                                                        @endphp
                                                    @switch($clase->pivot->posicion_total)
                                                        @case(1)
                                                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copaprimero.png')}}"/>
                                
                                                            @break
                                                        @case(2)
                                                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copasegundo.png')}}"/>
                                
                                                            @break
                                                        @case(3)
                                                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/copatercero.png')}}"/>
                                
                                                        @break
                                                        @default
                                                            @break
                                                    @endswitch
                                                @else
                                                    {{$clase->pivot->posicion_total}}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                @if($clase->pivot->posicion_categoria <= 3)
                                                    @php
                                                        $podios_categoria++;
                                                    @endphp
                                                    @switch($clase->pivot->posicion_categoria)
                                                        @case(1)
                                                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/primero.png')}}"/>
                                
                                                            @break
                                                        @case(2)
                                                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/segundo.png')}}"/>
                                
                                                            @break
                                                        @case(3)
                                                        <img class="gg-image-white inline" width="60" alt="Logo" src="{{asset('storage/uploads/icons-app/tercero.png')}}"/>
                                
                                                        @break
                                                        @default
                                                            @break
                                                    @endswitch
                                                @else
                                                    {{$clase->pivot->posicion_categoria}}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="text-green-800 bg-green-200 font-semibold px-2 rounded-full">
                                                    @php
                                                        $puntos_totales=$puntos_totales+$clase->pivot->puntos;
                                                        $array[($clase->id)-1]=$clase->pivot->puntos;
                                                    @endphp
                                                    {{$clase->pivot->puntos}}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>                      
                </div>
            </div>
            
            <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="rounded-md p-6 bg-white shadow">
                    <div class="mb-2 pb-2">
                        <h3 class="font-semibold text-lg text-gray-600">Participaciones</h3>
                        <p class="text-sm text-gray-500">Porcentaje de carreras disputadas</p>
                    </div>
                    <div id="donutchart" style="width: 900px; height: 500px;"></div>
                    <div id="line_top_x"></div>
                    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
                </div>             
            </div>    
        </div>
    </div> --}}
    @endsection 
    @section('scripts')
        
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Disputadas',  {{$clases->count()}}   ],
          ['Sin disputar',   {{8 - $clases->count()}}   ]
        ]);

        var options = {
          title: 'Participación Pruebas Campeonato',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <script>
      var data = google.visualization.arrayToDataTable([
        ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
         'Western', 'Literature', { role: 'annotation' } ],
        ['2010', 10, 24, 20, 32, 18, 5, ''],
        ['2020', 16, 22, 23, 30, 16, 9, ''],
        ['2030', 28, 19, 29, 30, 12, 13, '']
      ]);

      var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };
      var options_fullStacked = {
          isStacked: 'percent',
          height: 300,
          legend: {position: 'top', maxLines: 3},
          vAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
          }
        };

 </script>    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Pruebas');
      data.addColumn('number', 'Puntos conseguidos');
      data.addColumn('number', 'Puntos acumulados');

      data.addRows([

        ['Alfajarin', {{$array[0]}}, 80.8],
        ['Canfranc',  {{$array[1]}}, 69.5],
        ['Utebo',  {{$array[2]}},   57]
      ]);

      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
<script>
    var data = google.visualization.arrayToDataTable([
        ['Puntos conseguidos', 'Puntos no conseguidos', { role: 'annotation' } ],
        ['Alcañiz','100', 450, ''],
        ['Utebo','150', 400, ''],
        ['Canfranc','200', 350, '']
      ]);

      var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true
      };
</script>

      
@endsection

