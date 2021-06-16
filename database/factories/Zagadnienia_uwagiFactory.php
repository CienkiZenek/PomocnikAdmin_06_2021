<?php

namespace Database\Factories;

use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Zagadnienia_uwagi;

class Zagadnienia_uwagiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zagadnienia_uwagi::class;

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
            'zagadnienie_id' =>rand(1,20),
            'haslo_id' =>rand(1,20),
            'status' =>$this->faker->randomElement(['Nowa', 'Dodane',
                'Oczekuje', 'Usunięta']),
            'do' =>$this->faker->randomElement(['haslo', 'zagadnienie', 'zagadnienie', 'zagadnienie']),
            'naglowek' =>$this->faker->text(200),
            'tresc' =>$this->faker->text(1000),

        ];
    }
}
