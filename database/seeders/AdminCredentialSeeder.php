<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administator = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'administrator@email.com',
            'password' => Hash::make('administrator'),
            'id_number' => 123124,
            'number_of_studying_siblings' => null,
            'monthly_income' => '00000',
            'birthday' => '1990-01-01',
            'have_existing_scholarship' => null,
            'othersInput' => null,
            'age' => null,
        ]);

        $administator->addRole('administrator');


    }

}
