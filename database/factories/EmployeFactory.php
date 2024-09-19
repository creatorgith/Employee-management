<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Database\seeders\EmployeSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Employe;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    protected $model = Employe::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender =$this->faker->randomElements(['male', 'female'])[0];
        // dd($gender);
        // dd($gender[rand(0, count($gender) - 1)]);
        return [
            'firstname'=>fake()->firstname(),
            'lastname'=>fake()->lastname(),
            'address'=>fake()->address(),
            'joiningdate'=>$this->faker->date($format = 'Y-m-d', $min = 'now'),
            'gender' => $gender,
            'profilephoto'=> $this->faker->imageUrl(640, 400, 'people', true),
        ];
    }
}
