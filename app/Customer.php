<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function rooms() {
        return $this->belongsToMany('App\Room', 'rooms_customers', 'customer_id', 'room_id')->withPivot('occupied');
    }
}
