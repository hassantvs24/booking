<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'userID', 'discount', 'additionalCost', 'otherDescription', 'status'
    ];

    public function customer(){
        return $this->belongsTo('App\User', 'userID');
    }

    public function item(){
        return $this->hasMany('App\BookOption', 'bookingID');
    }


    public function payment(){
        $table = Payment::where('ref', 'Booking')->where('refID', $this->id)->get();
        return $table;
    }



}
