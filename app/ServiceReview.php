<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
    protected $table = 'service_review';
    protected $fillable = [
        'userID', 'serviceID', 'bookingID', 'rating', 'comment'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'userID');
    }

}
