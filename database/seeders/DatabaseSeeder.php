<?php

namespace Database\Seeders;

use App\Models\Married;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Catin',
            'email' => 'catin@example.com',
            'nik' => '1234567890',
            'username' => 'catin',
            'password' => Hash::make('password'),
            'role' => 'catin'
        ]);

        $staff = \App\Models\User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'username' => 'staff',
            'password' => Hash::make('password'),
            'role' => 'staff'
        ]);

        Married::create([
            'registration_number' => rand(),
            'counter' => 1,
            'akta_nikah_number' => '1/AKAD/' . now()->format('d') . '-I/' . now()->format('Y'),
            'users_id' => $user->id,
            'location_name' => 'Medan',
            'akad_date_masehi' => '2024-03-23 14:30:04',
            'akad_location' => 'Medan',
            'nationality_wife' => 'Indonesia',
            'nik_wife' => '123456',
            'name_wife' => 'Laura',
            'location_birth_wife' => 'Medan',
            'date_birth_wife' => '1999-03-23',
            'old_wife' => '25',
            'status_wife' => 'Lajang',
            'religion_wife' => 'Islam',
            'address_wife' => 'Jl. Gatot Subroto',
            'nationality_husband' => 'Indonesia',
            'nik_husband' => '654321',
            'name_husband' => 'Riky',
            'location_birth_husband' => 'Medan',
            'date_birth_husband' => '1999-01-23',
            'old_husband' => '25',
            'status_husband' => 'Lajang',
            'religion_husband' => 'Islam',
            'address_husband' => 'Jl. Setia Budi'
        ]);
    }
}
