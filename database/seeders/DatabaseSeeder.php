<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Carrera;
use App\Models\User;
use App\Models\Atleta;
use App\Models\Noticia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;





class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(1)->create([
            "name" => "Administrador",
            "email"=> "admin@correo.com",
            "password"=>bcrypt('12345678')
        ]);
        User::factory()->times(1)->create([
            "name" => "Presidente",
            "email"=> "presi@correo.com",
            "password"=>bcrypt('12345678')
        ]);
        User::factory()->times(1)->create([
            "name" => "Tesorero",
            "email"=> "tesorero@correo.com",
            "password"=>bcrypt('12345678')
        ]);

        Noticia::factory()->times(100)->create();

        for($i=1; $i<51;++$i){
            $origen = 'storage/app/public/uploads/uploads-club/logos-club-seeder/' .$i. '.jpg';
            $destino = 'storage/app/public/uploads/uploads-club/'.$i.'.jpg';
            $resultado = copy($origen, $destino);
        }

        $path = 'storage/app/public/uploads/csv/ClubesAragonTriatlon.csv';
        $lines = file($path);
        $array = array_map(function($v){return str_getcsv($v, ";");},$lines);

        for ($i=1; $i < sizeof($array); ++$i){
            $club = new Club();
            $club->nombre=$array[$i][0];
            $club->direccion=$array[$i][1];
            $club->telefonos=$array[$i][2];
            $club->http=$array[$i][3];
            $club->mail=$array[$i][4];
            $club->facebook=$array[$i][5];
            $club->logo=$i.'.jpg';
            $club->save();
        }


        $path = 'storage/app/public/uploads/csv/CarrerasAragonTriatlon.csv';
        $lines = file($path);
        $array = array_map(function($v){return str_getcsv($v, ";");},$lines);

        for ($i=1; $i < sizeof($array); ++$i){
            $carrera = new Carrera();
            $carrera->nombre=$array[$i][0];
            $carrera->modalidad=$array[$i][1];
            $carrera->competicion=$array[$i][2];
            $carrera->localidad=$array[$i][3];
            $carrera->provincia=$array[$i][4];
            $carrera->fecha=$array[$i][5];
            $carrera->distancia_1=$array[$i][6];
            $carrera->distancia_2=$array[$i][7];
            $carrera->distancia_3=$array[$i][8];
            $carrera->juez_arbitro=$array[$i][9];
            $carrera->save();
        }



        $path = 'storage/app/public/uploads/csv/AtletasAragonTriatlon.csv';
        $lines = file($path);
        $array = array_map(function($v){return str_getcsv($v, ";");},$lines);

        for ($i=1; $i < sizeof($array); ++$i){
            $atleta = new Atleta();
            $atleta->sexo=$array[$i][0];
            $atleta->nombre=$array[$i][1];
            $atleta->apellido_1=$array[$i][2];
            $atleta->apellido_2=$array[$i][3];
            $atleta->save();
        }

        DB::table('atleta_club')->delete();
        $path = 'storage/app/public/uploads/csv/atleta_club.csv';
        $lines = file($path);
        $array = array_map(function($v){return str_getcsv($v, ";");},$lines);
       
        for ($i=1; $i < sizeof($array); ++$i){
            DB::table('atleta_club')->insert([
            'atleta_id'=>$array[$i][0],
            'club_id'=>$array[$i][1],
            'fecha_alta'=>$array[$i][2],
            ]);
        }

        DB::table('atleta_carrera')->delete();
        $path = 'storage/app/public/uploads/csv/atleta_carrera.csv';
        $lines = file($path);
        $array = array_map(function($v){return str_getcsv($v, ";");},$lines);
       
        for ($i=1; $i < sizeof($array); ++$i){
            DB::table('atleta_carrera')->insert([
            'atleta_id'=>$array[$i][0],
            'carrera_id'=>$array[$i][1],
            'tiempo_1'=>$array[$i][2],
            'tiempo_2'=>$array[$i][3],
            'tiempo_3'=>$array[$i][4],
            'tiempo_total'=>$array[$i][5],
            'posicion_total'=>$array[$i][6],
            'posicion_categoria'=>$array[$i][7],
            'puntos'=>$array[$i][8],
            'categoria'=>$array[$i][9],
            ]);
        }


    }
}
  