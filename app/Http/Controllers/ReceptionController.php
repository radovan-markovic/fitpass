<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\src\Repository\User\UserReception;

class ReceptionController extends Controller
{

    public function __construct(UserReception $userReception){
        $this->userReception = $userReception;
    }

    public function newCheckIn(Request $request){

        $validated = $request->validate([
            'object_uuid'        => 'required|alpha_num',
            'card_uuid'         => 'required|alpha_num',
        ]);


        return $this->userReception->newUserCheckIn($request);

    }

}
