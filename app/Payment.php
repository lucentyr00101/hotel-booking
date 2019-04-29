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

    public function invoices() {
        return $this->hasMany('App\Invoice', 'payment_id');
    }

    public function rooms_customers() {
        return $this->belongsTo('App\RoomsCustomers',' rooms_customers_id');
    }
}
