<?php

namespace Database\Factories;

use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Propozycje_uwagi;

class Propozycje_uwagiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propozycje_uwagi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dodal_user' =>rand(1,10),
            'dodal_user_nazwa'=>$this->faker->name,
            'propozycja_id' =>rand(1,15),
            'status' =>$this->faker->randomElement(['Nowa', 'Dodane',
                'Oczekuje', 'Usunięta']),
            'naglowek' =>$this->faker->text(200),
            'tresc' =>$this->faker->text(1000),
        ];
    }
}
