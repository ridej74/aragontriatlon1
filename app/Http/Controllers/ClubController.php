<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs=Club::paginate(10);
        return view('club.index',compact("clubs"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('club.create');
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
            'mail'=>'required|email',
            'logo'=>'max:100000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es obligatorio',
            'logo.mimes'=>'El archivo no tiene un formato valido'
        ];

    
        
        //$club = Club::latest('id')->first();
        $club = new Club();
        //almacenar en BBDD
        $club->nombre = $request->input('nombre');
        $club->direccion = $request->input('direccion');
        $club->telefonos = $request->input('telefonos');
        $club->http = $request->input('http');
        $club->mail = $request->input('mail');
        $club->facebook = $request->input('facebook');

        //Validacion antes de guardar
        $this->validate($request,$validacion,$mensaje);

        $fecha = Carbon::now();
        $club->created_at = $fecha;
        $club->updated_at = $fecha;

        $club->save();

        $club = Club::latest('id')->first();
         //Averigua si hay una imagen
         if($request->hasFile('logo')){  
            $club->logo=$request->file('logo')->storeAs('public/uploads/uploads-club',$club->id.'.jpg');
        }
        $clubs=Club::paginate(10);
        return view('club.index',compact("clubs"));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = Club::findOrFail($id);
        return view('club.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club=Club::findOrFail($id);
        return view('club.edit', compact('club'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fecha = Carbon::now();

        if($request->hasFile('logo')){
            $club=Club::findOrFail($id);

            Storage::delete('public/uploads/uploads-club',$id.'.jpg');
            
            $Club['logo']=$request->file('logo')->storeAs('public/uploads/uploads-club',$id.'.jpg');
        }
        else{
            $club=Club::findOrFail($id);
            $club['logo']=$request->file('logo');
        }

        $club->nombre = $request->nombre;
        $club->direccion = $request->direccion;
        $club->telefonos = $request->telefonos;
        $club->http = $request->http;
        $club->mail = $request->mail;
        $club->facebook = $request->facebook;
        $club->created_at = $fecha;
        $club->updated_at = $fecha;
        $club->save();

         return redirect()->route('Clubs.index')->with('mensaje','El registro ha sido modificado!');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::destroy($id);
        return redirect()->route('Clubs.index')->with('mensaje','El registro ha sido eliminado!');
    }
    public function buscar(Request $request){
        $data=$request->validate([
            'nombre' => 'min:0',
            'direccion' => 'min:0',
            'mail' => 'min:0'
        ]);
        
        $nombre='%'.$data['nombre'].'%';
        $direccion='%'.$data['direccion'].'%';
        $mail='%'.$data['mail'].'%';

        $clubs=Club::latest()
        ->where('nombre','LIKE','%'.$nombre.'%')
        ->Where('direccion','LIKE','%'.$direccion.'%')
        ->Where('mail','LIKE','%'.$mail.'%')->paginate(10);
        
       
        return view('buscar.clubesindex',compact('clubs'));
    }
    public function invitadobuscar(Request $request){
        $data=$request->validate([
            'nombre' => 'min:0',
            'direccion' => 'min:0',
            'mail' => 'min:0'
        ]);
        
        $nombre='%'.$data['nombre'].'%';
        $direccion='%'.$data['direccion'].'%';
        $mail='%'.$data['mail'].'%';

        $clubs=Club::latest()
        ->where('nombre','LIKE','%'.$nombre.'%')
        ->Where('direccion','LIKE','%'.$direccion.'%')
        ->Where('mail','LIKE','%'.$mail.'%')->paginate(10);
        
       
        return view('buscar.invitadoclubesindex',compact('clubs'));
    }

    public function invitadoshow($id)
    {
        $club = Club::findOrFail($id);
        return view('invitado.club.show', compact('club'));
    }

    public function mostraratletas($id){
        $club = Club::findOrFail($id);
        $busquedas= $club->atletas;
        return view('invitado.club.atletas', compact('club','busquedas'));

    }

    public function clubes() {
        $clubs=Club::paginate(10);
        return view('invitado.club.index',compact("clubs"));
    }

}
