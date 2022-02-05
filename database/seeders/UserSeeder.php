<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'email@example.com'
        ]);

        User::create([
            'first_name'    => 'Janko',
            'last_name'     => 'Jankovic',
            'email'         => 'email@example.com'
        ]);

        User::create([
            'first_name'    => 'Marko',
            'last_name'     => 'Markovic',
            'email'         => 'email@example.com'
        ]);

        User::create([
            'first_name'    => 'Ana',
            'last_name'     => 'Andric',
            'email'         => 'email@example.com'
        ]);
    }
}
