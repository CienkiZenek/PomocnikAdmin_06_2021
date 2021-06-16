<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Hasla;

class HaslaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hasla::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'haslo' =>$this->faker->text(30),
        'tresc' =>$this->faker->text(990),
        'dodal_user' =>rand(1,10),
        'historia_zmian' =>'Utworzono '.now(),
        'status' =>$this->faker->randomElement(['Aktywny', 'Zawieszony',
            'Roboczy', 'Propozycja']),
        'dzial_id' =>rand(1,7),
        'kategoria_id' =>rand(1,7),

    ];
}
}
