<?php

namespace Database\Factories;

use App\Przypisy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrzypisyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Przypisy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tresc' =>$this->faker->text(35),
            'dodal_user' =>rand(1,10),
            'numer' =>rand(1,30),
            'id_pozycja' =>rand(1,23),
        ];
    }
}
