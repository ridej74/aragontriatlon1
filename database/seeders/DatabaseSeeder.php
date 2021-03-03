<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Noticia;
use Illuminate\Database\Seeder;


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
    }
}
  