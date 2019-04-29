<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    public function rooms() {
        return $this->belongsToMany('App\Room', 'rooms_customers', 'customer_id', 'room_id')->withPivot('id', 'occupied', 'datetime_of_arrival', 'datetime_of_departure', 'number_of_guest', 'deposit', 'mode_of_payment', 'credit_card_type', 'credit_card_number', 'created_at');
    }

    public function getCarbonArrivalAttribute() {
        return Carbon::parse($this->pivot->datetime_of_arrival)->format('F d, Y h:i:s A');
    }

    public function getCarbonDepartureAttribute() {
        return Carbon::parse($this->pivot->datetime_of_departure)->format('F d, Y h:i:s A');
    }

    public function payments() {
        return $this->hasMany('App\Payment', 'customer_id');
    }

    public function getCurrentRoomAttribute() {
        //also returns pivot data
        return $this->rooms()->where('occupied', 1)->first();
    }

    public function rooms_customers_pivot() {
        return $this->hasMany('App\RoomsCustomers', 'customer_id');
    }

    public function getFullNameAttribute() {
        return $this->first_name . ' ' . $this->middle_initial . ' ' . $this->last_name;
    }
}
