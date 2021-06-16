<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Memy;
class MemyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Memy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'podpis' =>$this->faker->text(240),
        'tytul' =>$this->faker->text(80),
        'dodal_user' =>rand(1,10),
        'status' =>$this->faker->randomElement(['Roboczy', 'Opublikowany',
            'Zawieszony']),
        'mem' =>'<img src="http://lorempixel.com/400/200/sports/" />',
    ];
}
}
