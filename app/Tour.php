<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['tour_name', 'tour_sub_title', 'rate'];

    public function inclusions() {
        return $this->hasMany('App\TourInclusion', 'tour_id');
    }
}
