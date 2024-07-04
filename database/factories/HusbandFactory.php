<?php

namespace Database\Factories;

use App\Models\Husband;
use App\Models\Married;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HusbandFactory extends Factory
{
    protected $model = Husband::class;

    public function definition()
    {
        return [
            'married_id' => Married::factory(),
            'citizen_husband' => $this->faker->randomElement(['WNI', 'WNA']),
            'nationality_husband' => $this->faker->country,
            'no_passport_husband' => $this->faker->optional()->numerify('##########'),
            'nik_husband' => $this->faker->optional()->numerify('##########'),
            'name_husband' => $this->faker->name,
            'location_birth_husband' => $this->faker->city,
            'date_birth_husband' => $this->faker->date,
            'old_husband' => $this->faker->numberBetween(20, 60),
            'status_husband' => $this->faker->word,
            'religion_husband' => $this->faker->word,
            'education_husband' => $this->faker->word,
            'job_husband' => $this->faker->jobTitle,
            'phone_number_husband' => $this->faker->phoneNumber,
            'email_husband' => $this->faker->safeEmail,
            'address_husband' => $this->faker->address,
            'nik_father_husband' => $this->faker->optional()->numerify('##########'),
            'is_unknown_father_husband' => $this->faker->boolean,
            'citizen_father_husband' => $this->faker->optional()->randomElement(['WNI', 'WNA']),
            'nationality_father_husband' => $this->faker->optional()->country,
            'no_passport_father_husband' => $this->faker->optional()->numerify('##########'),
            'name_father_husband' => $this->faker->optional()->name,
            'location_birth_father_husband' => $this->faker->optional()->city,
            'date_birth_father_husband' => $this->faker->optional()->date,
            'religion_father_husband' => $this->faker->optional()->word,
            'job_father_husband' => $this->faker->optional()->jobTitle,
            'address_father_husband' => $this->faker->optional()->address,
            'nik_mother_husband' => $this->faker->optional()->numerify('##########'),
            'is_unknown_mother_husband' => $this->faker->boolean,
            'citizen_mother_husband' => $this->faker->optional()->randomElement(['WNI', 'WNA']),
            'nationality_mother_husband' => $this->faker->optional()->country,
            'no_passport_mother_husband' => $this->faker->optional()->numerify('##########'),
            'name_mother_husband' => $this->faker->optional()->name,
            'location_birth_mother_husband' => $this->faker->optional()->city,
            'date_birth_mother_husband' => $this->faker->optional()->date,
            'religion_mother_husband' => $this->faker->optional()->word,
            'job_mother_husband' => $this->faker->optional()->jobTitle,
            'address_mother_husband' => $this->faker->optional()->address,
        ];
    }
}
