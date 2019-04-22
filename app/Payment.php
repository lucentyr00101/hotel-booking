<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function customer() {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function room() {
        return $this->belongsTo('App\Room', 'room_id');
    }
}
