<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras=Carrera::paginate(20);
        return view('carrera.index',compact("carreras"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacion
        $validacion=[
            'nombre'=>'required|string|max:200|min:3',
         
        ];

        $mensaje=[
            'required'=>'El :attribute es obligatorio'
        ];

    
        $carrera = new Carrera();
        //almacenar en BBDD
        $carrera->nombre = $request->input('nombre');
        $carrera->modalidad = $request->input('modalidad');
        $carrera->competicion = $request->input('competicion');
        $carrera->localidad = $request->input('localidad');
        $carrera->provincia = $request->input('provincia');
        $carrera->fecha = $request->input('fecha');
        $carrera->distancia_1 = $request->input('distancia_1');
        $carrera->distancia_2 = $request->input('distancia_2');
        $carrera->distancia_3 = $request->input('distancia_3');
        $carrera->juez_arbitro = $request->input('juez_arbitro');

        //Validacion antes de guardar
        $this->validate($request,$validacion,$mensaje);

        $fecha = Carbon::now();
        $carrera->created_at = $fecha;
        $carrera->updated_at = $fecha;

        $carrera->save();

       
        $carreras=Carrera::paginate(10);
        return view('carrera.index',compact("carreras"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = Carrera::findOrFail($id);
        $pruebas = Carrera::get();
        
        return view('carrera.show', compact('carrera','pruebas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera=Carrera::findOrFail($id);
        return view('carrera.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fecha = Carbon::now();

        $carrera=Carrera::findOrFail($id);


        $carrera->nombre = $request->nombre;
        $carrera->modalidad = $request->modalidad;
        $carrera->competicion = $request->competicion;
        $carrera->localidad = $request->localidad;
        $carrera->provincia = $request->provincia;
        $carrera->fecha = $request->fecha;
        $carrera->distancia_1 = $request->distancia_1;
        $carrera->distancia_2 = $request->distancia_2;
        $carrera->distancia_3 = $request->distancia_3;
        $carrera->juez_arbitro = $request->juez_arbitro;
        $carrera->created_at = $fecha;
        $carrera->updated_at = $fecha;
        $carrera->save(); 

        return redirect()->route('Carreras.index')->with('mensaje','El registro ha sido modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::destroy($id);
        return redirect()->route('Carreras.index')->with('mensaje','El registro ha sido eliminado!');
    }

    public function buscar(Request $request){
        $data=$request->validate([
            'localidad' => 'min:0',
            'provincia' => 'min:0',
            'fecha' => 'min:0'
        ]);
        
        $localidad='%'.$data['localidad'].'%';
        $provincia='%'.$data['provincia'].'%';
        $fecha='%'.$data['fecha'].'%';

        $carreras=Carrera::latest()
        ->where('localidad','LIKE','%'.$localidad.'%')
        ->where('provincia','LIKE','%'.$provincia.'%')
        ->where('fecha','LIKE','%'.$fecha.'%')->paginate(10);
        
       
        return view('buscar.carrerasindex',compact('carreras'));
    }

    public function invitadoshow($id)
    {
        $carrera = Carrera::findOrFail($id);
        $pruebas = Carrera::get();
        
        return view('invitado.carrera.show', compact('carrera','pruebas'));
    }
    
    public function tiemposcarrera ($id) {

        $carreras = Carrera::findOrFail($id);
        $clases=$carreras->atletas;
        return view('invitado.carrera.tiempos',compact('carreras','clases'));
    }


    public function invitadobuscar(Request $request){
        $data=$request->validate([
            'localidad' => 'min:0',
            'provincia' => 'min:0',
            'fecha' => 'min:0'
        ]);
        
        $localidad='%'.$data['localidad'].'%';
        $provincia='%'.$data['provincia'].'%';
        $fecha='%'.$data['fecha'].'%';

        $carreras=Carrera::latest()
        ->where('localidad','LIKE','%'.$localidad.'%')
        ->where('provincia','LIKE','%'.$provincia.'%')
        ->where('fecha','LIKE','%'.$fecha.'%')->paginate(10);
        
       
        return view('buscar.invitadocarrerasindex',compact('carreras'));
    }
    public function carreras_clasificaciones() {
        $carreras = Carrera::paginate(10);
        return view('invitado.carrera.index',compact("carreras"));
    }

     public function mapa()
     {
         $pruebas = Carrera::get();
         
         return view('invitado.carrera.mapa', compact('pruebas'));
     }
}
