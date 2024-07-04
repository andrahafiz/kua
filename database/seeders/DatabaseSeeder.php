<?php

namespace Database\Seeders;

use App\Models\Wife;
use App\Models\Husband;
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

        // Married::create([
        //     'registration_number' => rand(),
        //     'counter' => 1,
        //     'akta_nikah_number' => '1/AKAD/' . now()->format('d') . '-I/' . now()->format('Y'),
        //     'users_id' => $user->id,
        //     'location_name' => 'Medan',
        //     'akad_date_masehi' => '2024-03-23 14:30:04',
        //     'akad_location' => 'Medan',
        // 'nationality_wife' => 'Indonesia',
        // 'nik_wife' => '123456',
        // 'name_wife' => 'Laura',
        // 'location_birth_wife' => 'Medan',
        // 'date_birth_wife' => '1999-03-23',
        // 'old_wife' => '25',
        // 'status_wife' => 'Lajang',
        // 'religion_wife' => 'Islam',
        // 'address_wife' => 'Jl. Gatot Subroto',
        // 'nationality_husband' => 'Indonesia',
        // 'nik_husband' => '654321',
        // 'name_husband' => 'Riky',
        // 'location_birth_husband' => 'Medan',
        // 'date_birth_husband' => '1999-01-23',
        // 'old_husband' => '25',
        // 'status_husband' => 'Lajang',
        // 'religion_husband' => 'Islam',
        // 'address_husband' => 'Jl. Setia Budi'
        // ]);

        // Membuat instans Married
        $married = Married::create([
            'registration_number' => rand(),
            'counter' => 1,
            'akta_nikah_number' => '1/AKAD/' . now()->format('d') . '-I/' . now()->format('Y'),
            'users_id' => $user->id,
            'location_name' => 'Medan',
            'akad_date_masehi' => '2024-03-23 14:30:04',
            'akad_location' => 'Medan',
            'status_payment' => 0,
            'status' => 0,
            'status_married' => 0,
            'pramarried_date' => null,
            'penghulu_id' => null,
            'married_on' => 'DI KUA',
            'kua' => 'KUA Medan'
        ]);

        // Membuat instans Husband dan menghubungkannya dengan Married
        $husband = Husband::create([
            'married_id' => $married->id,
            'citizen_husband' => 'WNI',
            'nationality_husband' => 'Indonesia',
            'no_passport_husband' => null,
            'nik_husband' => '654321',
            'name_husband' => 'Riky',
            'location_birth_husband' => 'Medan',
            'date_birth_husband' => '1999-01-23',
            'old_husband' => 25,
            'status_husband' => 'Lajang',
            'religion_husband' => 'Islam',
            'education_husband' => null,
            'job_husband' => null,
            'phone_number_husband' => null,
            'email_husband' => null,
            'address_husband' => 'Jl. Setia Budi',
            'nik_father_husband' => null,
            'is_unknown_father_husband' => false,
            'citizen_father_husband' => null,
            'nationality_father_husband' => null,
            'no_passport_father_husband' => null,
            'name_father_husband' => null,
            'location_birth_father_husband' => null,
            'date_birth_father_husband' => null,
            'religion_father_husband' => null,
            'job_father_husband' => null,
            'address_father_husband' => null,
            'nik_mother_husband' => null,
            'is_unknown_mother_husband' => false,
            'citizen_mother_husband' => null,
            'nationality_mother_husband' => null,
            'no_passport_mother_husband' => null,
            'name_mother_husband' => null,
            'location_birth_mother_husband' => null,
            'date_birth_mother_husband' => null,
            'religion_mother_husband' => null,
            'job_mother_husband' => null,
            'address_mother_husband' => null,
        ]);

        // Membuat instans Wife dan menghubungkannya dengan Married
        $wife = Wife::create([
            'married_id' => $married->id,
            'citizen_wife' => 'WNI',
            'nationality_wife' => 'Indonesia',
            'no_passport_wife' => null,
            'nik_wife' => '123456',
            'name_wife' => 'Laura',
            'location_birth_wife' => 'Medan',
            'date_birth_wife' => '1999-03-23',
            'old_wife' => 25,
            'status_wife' => 'Lajang',
            'religion_wife' => 'Islam',
            'education_wife' => null,
            'job_wife' => null,
            'phone_number_wife' => null,
            'email_wife' => null,
            'address_wife' => 'Jl. Gatot Subroto',
            'nik_father_wife' => null,
            'is_unknown_father_wife' => false,
            'citizen_father_wife' => null,
            'nationality_father_wife' => null,
            'no_passport_father_wife' => null,
            'name_father_wife' => null,
            'location_birth_father_wife' => null,
            'date_birth_father_wife' => null,
            'religion_father_wife' => null,
            'job_father_wife' => null,
            'address_father_wife' => null,
            'nik_mother_wife' => null,
            'is_unknown_mother_wife' => false,
            'citizen_mother_wife' => null,
            'nationality_mother_wife' => null,
            'no_passport_mother_wife' => null,
            'name_mother_wife' => null,
            'location_birth_mother_wife' => null,
            'date_birth_mother_wife' => null,
            'religion_mother_wife' => null,
            'job_mother_wife' => null,
            'address_mother_wife' => null,
        ]);


        Married::factory()
            ->count(10)
            ->has(Husband::factory())
            ->create();
    }
}
