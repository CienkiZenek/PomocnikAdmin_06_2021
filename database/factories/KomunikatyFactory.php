<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Komunikaty;
class KomunikatyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Komunikaty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'tytul' =>$this->faker->text(60),
        'naglowek' =>$this->faker->text(240),
        'rodzaj' =>$this->faker->word(),
        'tresc' =>$this->faker->text(500),
        'dodal_user' =>rand(1,10),
        'link' =>$this->faker->url,
    ];
}
}
