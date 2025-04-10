<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Scholarship;
use App\Models\SchoolYear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        $this->call(AdminCredentialSeeder::class);


        $representative = \App\Models\User::factory()->create([
            'name' => 'Representatives',
            'email' => 'representative@email.com',
            'password' => Hash::make('representative@email.com'),
            'id_number' => 123124,
            'number_of_studying_siblings' => null,
            'monthly_income' => '000000',
            'birthday' => '1990-01-01',
            'have_existing_scholarship' => null,
            'othersInput' => null,
            'age' => null,
        ]);
        $representative->addRole('representative');


    }
}
