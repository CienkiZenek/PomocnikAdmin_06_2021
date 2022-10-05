<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Zagadnienia;
class ZagadnieniaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zagadnienia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'zagadnienie' =>$this->faker->text(30),
        'tresc' =>$this->faker->text(790),
        'w_skrocie' =>$this->faker->text(300),
        'wiecej' =>$this->faker->text(890),
        'zajawka_tytul' =>$this->faker->text(20),
        'zajawka' =>$this->faker->text(80),
        'zajawka_pokaz' =>'Nie',
        'rozszerz' =>$this->faker->text(1100),
        'historia_zmian' =>'Utworzono '.now(),
        'dodal_user' =>rand(1,10),
        'status' =>$this->faker->randomElement(['Aktywny', 'Zawieszony',
            'Roboczy', 'Propozycja']),
        'dzial_id' =>rand(1,10),
        'kategoria_id' =>rand(1,10),
        'haslo_id' =>rand(1,10),
        'podpisObrazek1' =>$this->faker->text(250),
        'tytulObrazek1' =>$this->faker->text(100),
        'podpisObrazek2' =>$this->faker->text(250),
        'tytulObrazek2' =>$this->faker->text(100),
        'ramka_mala' =>$this->faker->text(400),
        'ramka_duza' =>$this->faker->text(800),

    ];
    }
}
