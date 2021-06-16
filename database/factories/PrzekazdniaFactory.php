<?php

namespace Database\Factories;

use App\Przekazdnia;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrzekazdniaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Przekazdnia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tytul' =>$this->faker->text(30),
            'naglowek' =>$this->faker->text(150),
            'tresc' =>$this->faker->text(300),
            'ramka1' =>$this->faker->text(100),
            'ramka2' =>$this->faker->text(100),
            'status' =>$this->faker->randomElement(['Roboczy', 'Opublikowany',
                'Zawieszony', 'Archiwum']),
            'dodal_user_nazwa'=>$this->faker->name,
            'dodal_user' =>rand(1,10),
        ];
    }
}
