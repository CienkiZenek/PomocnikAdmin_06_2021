<?php

namespace Database\Factories;

use App\Pliki;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlikiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pliki::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plik' =>$this->faker->url,
            'plik_nazwa' =>$this->faker->text(100),
            'dodal_user' =>rand(1,10),
            'id_pozycja' =>rand(1,23),
            'dzial' =>$this->faker->randomElement(['hasla', 'zagadnienia']),

        ];
    }
}
