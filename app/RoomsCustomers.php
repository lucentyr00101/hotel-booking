<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomsCustomers extends Model
{
    protected $table = 'rooms_customers';

    public function payment() {
        return $this->hasOne('App\Payment', 'rooms_customers_id');
    }
}
