<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Miejsca;
use Illuminate\Support\Str;

class MiejscaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Miejsca::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'link' =>$this->faker->url,
        'tytul' =>$this->faker->text(80),
        'rodzaj' =>$this->faker->randomElement(['Forum', 'Wiadomość',
            'Inne','InnySocial']),
        'status' =>$this->faker->randomElement(['Aktywne', 'Wstrzymane',
            'Archiwum']),
        'dodal_user_nazwa'=>$this->faker->name,
        'opis' =>$this->faker->text(500),
        'media_id' =>rand(1,12),
        'dodal_user' =>rand(1,10),

    ];
    }
/*
 * rodzaj' =>$this->faker->randomElement(['Forum', 'Wiadomość',
            'Inne', 'Facebook', 'Twitter', 'InnySocial', 'Instagram', 'Linkedin']),
 * */
}

