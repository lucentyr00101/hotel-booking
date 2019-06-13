<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RoomsCustomers extends Model
{
    protected $table = 'rooms_customers';

    public function payment() {
        return $this->hasOne('App\Payment', 'rooms_customers_id');
    }

    public function customer() {
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function room() {
        return $this->belongsTo('App\Room', 'room_id');
    }

    public function getCarbonArrivalAttribute() {
        return Carbon::parse($this->datetime_of_arrival)->format('F d, Y h:i A');
    }

    public function getCarbonDepartureAttribute() {
        return Carbon::parse($this->datetime_of_departure)->format('F d, Y h:i A');
    }
}
