<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * Get the users for the position.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
