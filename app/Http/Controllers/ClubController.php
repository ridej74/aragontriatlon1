<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Club;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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

        //Validacion
        $data = $request->validate([
            'nombre'=>'required|min:6',
            'logo'=>'required|image',
        ]);

        //Obtener la ruta de la imagen
        $ruta_logo = $request['logo']->store('upload-clubs','public');
        $fecha = Carbon::now();
//dd(public_path("/{$ruta_logo}"));
        //resize de la imagen
        $img = Image::make(public_path("/storage/{$ruta_logo}"))->fit(750,750);
        $img->save();  

        //almacenar en BBDD
        DB::table('clubs')->insert([
            'nombre'=>$data['nombre'],
            'direccion'=>$data['direccion'],
            // 'telefono/s'=> $data['telefono/s'],
            // 'http'=> $data['http'],
            // 'mail'=> $data['mail'],
            // 'facebook'=> $data['facebook'],
            'logo'=> $ruta_logo,
            'created_at'=> $fecha,
            'updated_at'=> $fecha
        ]);

        $clubs=Club::paginate(10);
        return view('club.index',compact("clubs"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
}
