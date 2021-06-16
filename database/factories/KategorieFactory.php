<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Kategorie;
class KategorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kategorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'kategoria' =>$this->faker->text(15),
        'opis' =>$this->faker->text(240),
        'dodal_user' =>rand(1,10),
        'status' =>$this->faker->text(10),
        'dzial_id' =>rand(1,7),
    ];
}
}
