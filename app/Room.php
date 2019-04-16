<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function customers() {
        return $this->belongsToMany('App\Customer', 'rooms_customers', 'room_id', 'customer_id')->withPivot('occupied');
    }
}
