<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Dzialy;

class DzialyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dzialy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dzial' => $this->faker->randomElement(['Dzial 1', 'Dzial 2',
                'Dzial 3', 'Dzial 4', 'Dzial 5', 'Dzial 6', 'Dzial 7']),
            'opis' => $this->faker->text(240),
            'status' => $this->faker->text(10),
            'dodal_user' =>rand(1,10)
        ];
    }
}
