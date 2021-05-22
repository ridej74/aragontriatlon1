<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Atleta;
Use App\Models\Carrera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AtletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atletas=Atleta::paginate(20);
        return view('atleta.index',compact("atletas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atleta.create');
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
            'nombre'=>'required|string|max:100|min:3',
            'apellido_1'=>'required|string|max:100|min:3',
            'sexo'=>'required',
        ];

        $mensaje=[
            'required'=>'El :attribute es obligatorio',
        ];
        $atleta = Atleta::latest('id')->first();
        //almacenar en BBDD
        $atleta->sexo = $request->input('sexo');
        $atleta->nombre = $request->input('nombre');
        $atleta->apellido_1 = $request->input('apellido_1');
        $atleta->apellido_2 = $request->input('apellido_2');

        //Validacion antes de guardar
        $this->validate($request,$validacion,$mensaje);

        $fecha = Carbon::now();
        $atleta->created_at = $fecha;
        $atleta->updated_at = $fecha;

        $atleta->save();
        $atletas=Atleta::paginate(10);
        return view('atleta.index',compact("atletas"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atleta = Atleta::findOrFail($id);
        $pruebas = $atleta->clubs;
        $clases = $atleta->carreras;
        $i=0;
        $podios=0;


        return view('atleta.show', compact('atleta','pruebas','clases','i','id','podios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atleta=Atleta::findOrFail($id);
        return view('atleta.edit', compact('atleta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fecha = Carbon::now();

        $atleta=Atleta::findOrFail($id);

        $atleta->sexo = $request->sexo;
        $atleta->nombre = $request->nombre;
        $atleta->apellido_1 = $request->apellido_1;
        $atleta->apellido_2 = $request->apellido_2;
        $atleta->created_at = $fecha;
        $atleta->updated_at = $fecha;
        $atleta->save();

         return redirect()->route('Atletas.index')->with('mensaje','El registro ha sido modificado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atleta = Atleta::destroy($id);
        return redirect()->route('Atletas.index')->with('mensaje','El registro ha sido eliminado!');
    }

    public function buscar(Request $request){
        $data=$request->validate([
            'nombre' => 'min:0',
            'apellido_1' => 'required',
            'apellido_2' => 'min:0'
        ]);
        
        $nombre='%'.$data['nombre'].'%';
        $apellido_1='%'.$data['apellido_1'].'%';
        $apellido_2='%'.$data['apellido_2'].'%';

        $atletas=Atleta::latest()
        ->where('nombre','LIKE','%'.$nombre.'%')
        ->Where('apellido_1','LIKE','%'.$apellido_1.'%')
        ->Where('apellido_2','LIKE','%'.$apellido_2.'%')->paginate(7);
        
       
        return view('buscar.atletasindex',compact('atletas'));
    }

    public function invitadobuscar(Request $request){
        $data=$request->validate([
            'nombre' => 'min:0',
            'apellido_1' => 'required',
            'apellido_2' => 'min:0'
        ]);
        
        $nombre='%'.$data['nombre'].'%';
        $apellido_1='%'.$data['apellido_1'].'%';
        $apellido_2='%'.$data['apellido_2'].'%';

        $atletas=Atleta::latest()
        ->where('nombre','LIKE','%'.$nombre.'%')
        ->Where('apellido_1','LIKE','%'.$apellido_1.'%')
        ->Where('apellido_2','LIKE','%'.$apellido_2.'%')->paginate(10);
        
       
        return view('buscar.invitadoatletasindex',compact('atletas'));
    }

    public function invitadoshow($id)
    {
        $atleta = Atleta::findOrFail($id);
        $pruebas = $atleta->clubs;
        $clases = $atleta->carreras;
        $i=0;
        $podios=0;
        return view('invitado.atleta.show', compact('atleta','pruebas','clases','i','id','podios'));
    }

    public function atletas_clubes() {
        $atletas=Atleta::paginate(10);
        return view('invitado.atleta.index',compact("atletas"));
    }
   


}
