<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVisitsLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card_uuid',
        'object_uuid'
    ];
}
