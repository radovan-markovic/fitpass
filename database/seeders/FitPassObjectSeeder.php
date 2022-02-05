<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FitpassObject;

class FitPassObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FitpassObject::create([
            'name'          => 'Teretana Athlete',
            'object_uuid'   => 23479,
        ]);

        FitpassObject::create([
            'name'    => 'Teretana New Body',
            'object_uuid'   => 55501,
        ]);

        FitpassObject::create([
            'name'    => 'Bazeni Aqua',
            'object_uuid'   => 98241,
        ]);

        FitpassObject::create([
            'name'    => 'Otvoreno klizaliste Pahuljica',
            'object_uuid'   => 30489,
        ]);
    }
}
