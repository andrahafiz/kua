<?php

namespace Database\Factories;

use App\Models\Married;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MarriedFactory extends Factory
{
    protected $model = Married::class;

    public function definition()
    {
        return [
            'users_id' => User::factory(),
            'akta_nikah_number' => $this->faker->unique()->numerify('##########'),
            'document_akta_nikah' => $this->faker->url,
            'counter' => $this->faker->numberBetween(0, 100),
            'registration_number' => $this->faker->unique()->numerify('##########'),
            'location_name' => $this->faker->city,
            'akad_date_masehi' => $this->faker->dateTime,
            'akad_location' => $this->faker->address,
            'desa_location' => $this->faker->address,
            'married_on' => $this->faker->randomElement(['DI KUA', 'DI LUAR KUA']),
            'kua' => $this->faker->company,
            'status_payment' => $this->faker->numberBetween(0, 1),
            'status' => $this->faker->numberBetween(0, 4),
            'status_married' => $this->faker->randomElement(['Menikah', 'Rujuk', 'Cerai']),
            'pramarried_date' => $this->faker->dateTime,
            'penghulu_id' => null // Change this if you have a penghulu factory
        ];
    }
}
