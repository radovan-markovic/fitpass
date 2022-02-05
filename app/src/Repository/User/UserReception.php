<?php

namespace App\src\Repository\User;

use App\Models\FitpassObject;
use App\Models\UserCards;
use App\Models\UserVisitsLogs;
use Carbon\Carbon;

class UserReception{

    public function newUserCheckIn($request){

        $response = 200;
        $data['name'] =  $this->checkCard($request->card_uuid);
        $data['object_name'] = $this->checkObject($request->object_uuid);

        if($data['name'] == false){
            $data['name'] = 'No name found.';
            $response = 404;
        }
        if($data['object_name'] == false){
            $data['object_name'] = 'Fitpass object not found.';;
            $response = 404;
        }

        if ($response == 200){
            if ( $this->checkUserTodayCheckIn($request->card_uuid, $request->object_uuid) == false ){
                $this->logCheckIn($request->card_uuid, $request->object_uuid);
            }else{
                $data = [];
                $data['message'] = 'You already used this object today.';
            }
        }

        return response()->json($data, $response);

    }

    public function checkCard($card_uuid){

        $uc = $this->getUser($card_uuid);
        if ($uc == null){
            return false;
        }
        return  $uc->user->first_name . ' ' . $uc->user->last_name;
    }

    public function checkObject($object_uuid){
        $fitpass_object = FitpassObject::where('object_uuid', $object_uuid)->first();
        if ($fitpass_object == null){
            return false;
        }
        return $fitpass_object->name;
    }

    public function checkUserTodayCheckIn($card_uuid, $object_uuid){
        $uc = $this->getUser($card_uuid);

        $log = UserVisitsLogs::where('card_uuid', $card_uuid)
            ->where('object_uuid', $object_uuid)
            ->where('user_id', $uc->user->id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if ($log == null){
            return false;
        }
        return true;
    }

    public function logCheckIn($card_uuid, $object_uuid){

        $uc = $this->getUser($card_uuid);
        UserVisitsLogs::create([
            'user_id'           => $uc->user->id,
            'card_uuid'         => $card_uuid,
            'object_uuid'       => $object_uuid,
        ]);

    }

    public function getUser($card_uuid){
        return UserCards::where('card_uuid', $card_uuid)->with('user')->first();
    }
}
