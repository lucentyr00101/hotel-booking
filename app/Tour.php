<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['tour_name', 'tour_sub_title', 'rate'];

    public function inclusions() {
        return $this->hasMany('App\TourInclusion', 'tour_id');
    }

    public function customers() {
        return $this->belongsToMany('App\Customer', 'tours_customers', 'tour_id', 'customer_id')->withPivot('number_of_adult_guests', 'number_of_child_guests', 'amount');
    }
}
