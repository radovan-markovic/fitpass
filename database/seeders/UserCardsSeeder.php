<?php

namespace Database\Seeders;

use App\Models\UserCards;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserCardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $key => $user){
            UserCards::create([
                'card_uuid'     => 4825 . $key,
                'user_id'       => $user->id,
            ]);
        }

    }
}
