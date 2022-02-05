<?php

namespace Database\Seeders;

use App\Models\FitpassObject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            FitPassObjectSeeder::class,
            UserCardsSeeder::class,
        ]);
    }
}
