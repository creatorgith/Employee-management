<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Database\seeders\StudentSedder;
use App\Models\Countries;
use App\Models\States;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    
    protected $model = Student::class;
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        
        $country =  Countries::first()->pluck('id');
        $states = States::first()->pluck('id');
        $gender =['male','female'];
//    dd ($gender[rand(0, count($gender) - 1)]);
        return [
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'phno' => fake()->userName(),
            'file' => $this->faker->imageUrl(640, 480, 'people', true),
            'country_id' =>  $country[rand(0, count($country) - 1)],
            'state_id' =>  $states[rand(0, count($states) - 1)],

            
            ];
    }
}
