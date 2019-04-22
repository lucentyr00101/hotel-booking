<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Room extends Model
{
    public function customers() {
        return $this->belongsToMany('App\Customer', 'rooms_customers', 'room_id', 'customer_id')->withPivot('id', 'occupied', 'datetime_of_arrival', 'datetime_of_departure', 'number_of_guest', 'deposit', 'mode_of_payment', 'credit_card_type', 'credit_card_number', 'created_at');
    }

    public function getCarbonArrivalAttribute() {
        return Carbon::parse($this->pivot->datetime_of_arrival)->format('F d, Y h:i:s A');
    }

    public function getCarbonDepartureAttribute() {
        return Carbon::parse($this->pivot->datetime_of_departure)->format('F d, Y h:i:s A');
    }
}
