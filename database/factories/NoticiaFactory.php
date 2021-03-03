<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>$this -> faker -> company,
            'descripcion'=>$this -> faker -> paragraph(2),
            'imagen'=>$this -> faker -> imageUrl(),
            'user_id'=> User::all()->random()->id,
            'created_at'=>now()
        ];
    }
}
