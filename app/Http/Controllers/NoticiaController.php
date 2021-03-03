<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias=Noticia::with('user')->paginate(10);
        return view('noticia.index',compact("noticias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticia.create');
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //Validacion
        $data = $request->validate([
            'titulo'=>'required|min:6',
            'descripcion'=>'required',
            'imagen'=>'required|image',
        ]);
        //Obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-noticias','public');
        $fecha = Carbon::now();

        DB::table('noticias')->insert([
            'titulo'=>$data['titulo'],
            'descripcion'=> $data['descripcion'],
            'imagen'=> $ruta_imagen,
            'user_id'=> Auth::user()->id,
            'created_at'=> $fecha,
            'updated_at'=> $fecha
        ]);


        $noticias=Noticia::with('user')->paginate(10);
        return view('noticia.index',compact("noticias"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        //
    }
}
