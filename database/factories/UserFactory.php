<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
        'name' =>$this->faker->name,
        'email' =>$this->faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'ranga' => 'Starszy',
        'uprawnienia' => 'Czytelnik',
        'stan' => 'Aktywny',
        'izsk_warunek' => false,
        'izsk' => 'Nie',
        'zgoda_listy_red' => false,
        'zgoda_listy_innych' => false,
        'zgoda_regulamin' => true,
        'remember_token' => Str::random(10),
    ];
    }

    public function admin()
    {
        return $this->state(function () {
            return [
                'name' => 'Admin',
                'email' => 'email@domena.pl',
                'password' => bcrypt('haslo')
            ];
        });
    }


}

/*$factory->state(User::class, 'admin', function (Faker $faker) {
   /* return [
        'name' => 'Admin',
        'email' => 'email@domena.pl',
        'password' => bcrypt('haslo')

    ];*/
