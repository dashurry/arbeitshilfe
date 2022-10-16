<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserNotifications extends Model
{
    //

    public function sender()
    {
        return $this->belongsTo(Profile::class,"from_id","user_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class,"from_id","id");
    }

}
