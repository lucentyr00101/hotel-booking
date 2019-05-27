<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourInclusion extends Model
{
    protected $fillable = ['item'];

    public function tour() {
        return $this->belongsTo('App\Tour', 'tour_id');
    }
}
