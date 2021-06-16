<?php

namespace Database\Factories;

use App\Bibliografia;
use Illuminate\Database\Eloquent\Factories\Factory;

class BibliografiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bibliografia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tresc' =>$this->faker->text(15),
            'dodal_user' =>rand(1,10),
            'id_pozycja' =>rand(1,23),
            'dzial' =>$this->faker->randomElement(['hasla', 'zagadnienia']),

        ];
    }
}
