<?php

namespace Database\Factories;

use App\Linki;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Linki::class;

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
            'link' =>$this->faker->url,
        ];
    }
}
