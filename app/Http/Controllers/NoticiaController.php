<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use App\Models\Club;
use App\Models\User;
use App\Models\Noticia;
use Illuminate\Support\Arr;
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
    public function show($id)
    {
        $noticias=Noticia::findOrFail($id);
        $noticia_autor=Noticia::with('user')->paginate(10);
        return view('noticia.show',compact('noticias','noticia_autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia=Noticia::findOrFail($id);
        return view('noticia.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fecha = Carbon::now();

        if($request->hasFile('imagen')){
            $noticia=Noticia::findOrFail($id);

            Storage::delete('public/uploads/uploads-noticia',$id.'.jpg');
            
            $noticia['imagen']=$request->file('imagen')->storeAs('public/uploads/uploads-noticia',$id.'.jpg');
        }
        else{
            $noticia=Noticia::findOrFail($id);
            $noticia['imagen']=$request->file('imagen');
        }

        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        $noticia->imagen = $request->imagen;
        $noticia->user->name = $request->user_id;
        $noticia->mail = $request->mail;
        $noticia->created_at = $fecha;
        $noticia->updated_at = $fecha;
        $noticia->save();

         return redirect()->route('Noticias.index')->with('mensaje','El registro ha sido modificado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::destroy($id);
        return redirect()->route('Noticias.index')->with('mensaje','El registro ha sido eliminado!');
    }

    public function buscar(Request $request){
        $data=$request->validate([
            'titulo' => 'min:0',
            'user_id' => 'min:0'
        ]);

        $titulo='%'.$data['titulo'].'%';

        $noticias=Noticia::latest()
        ->where('titulo','LIKE','%'.$titulo.'%')->paginate(10);
            
        return view('buscar.noticiasindex',compact('noticias'));
    }

    public function invitadobuscar(Request $request){
        $data=$request->validate([
            'titulo' => 'min:0',
            'autor' => 'min:0'
        ]);

        $titulo='%'.$data['titulo'].'%';
        $autor='%'.$data['autor'].'%';
        
        $buscar_autor= DB::table('users')
        ->where('name','LIKE','%'.$autor.'%')
        ->get('id');
        $autor = Arr::flatten($buscar_autor[0]); 

        $noticias=Noticia::latest()
        ->where('titulo','LIKE','%'.$titulo.'%')
        ->where('user_id','LIKE','%'.$autor[0].'%')
        ->paginate(10);
       
        return view('buscar.noticiasindex',compact('noticias'));
    }

    public function invitadoshow($id)
    {
        $noticias=Noticia::findOrFail($id);
        $noticia_autor=Noticia::with('user')->paginate(10);
        return view('invitado.noticia.show',compact('noticias','noticia_autor'));
    }

    public function noticias() {
        $noticias= Noticia::get();
        return view('invitado.noticia.index', compact('noticias'));
    }

}
