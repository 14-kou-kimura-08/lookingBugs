<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /**
     * Get the users for the meeting.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
