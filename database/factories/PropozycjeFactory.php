<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Propozycje;

class PropozycjeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Propozycje::class;

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
            'status' =>$this->faker->randomElement(['Nowa', 'Wykorzystana',
                'Oczekuje', 'Archiwalna', 'Usunięta']),
            'tytul' =>$this->faker->text(100),
            'tresc' =>$this->faker->text(1000),
        ];
    }
}