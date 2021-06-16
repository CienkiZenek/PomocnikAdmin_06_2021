<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Media;


class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'nazwa' =>$this-> faker->text(15),
        'dodal_user' =>rand(1,10),
        'link' =>$this-> faker->url,
    ];
}
}
