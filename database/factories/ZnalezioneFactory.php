<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Znalezione;
class ZnalezioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Znalezione::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'nazwa' =>$this->faker->text(90),
        'link' =>$this->faker->url,
        'rodzaj' =>$this->faker->randomElement(['Przeczytaj koniecznie', 'Warto wiedzieć',
            'Można odnotować', 'Ciekawostka', 'Tak myślą wrogowie']),
        'status' =>$this->faker->randomElement(['Aktywne', 'Wstrzymane',
            'Archiwum']),
        'dodal_user_nazwa'=>$this->faker->name,
       // 'komentarz' =>$this->faker->isbn13(),
        'komentarz' =>$this->faker->text(240),
        'media_id' =>rand(1,12),
        'dodal_user' =>rand(1,10),

    ];
    }
}
