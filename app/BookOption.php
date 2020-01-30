<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BookOption extends Model
{
    protected $table = 'book_option';
    protected $fillable = [
        'bookingID', 'serviceID', 'serviceDate', 'timeSlotID', 'package', 'pricing', 'qty', 'isComplete'
    ];

    public function service(){
        return $this->belongsTo('App\Services', 'serviceID');
    }

    public function booking(){
        return $this->belongsTo('App\Booking', 'bookingID');
    }

    public function review(){
        $table = ServiceReview::where('serviceID', $this->serviceID)->where('bookingID', $this->bookingID)->where('userID', Auth::user()->id)->first();
        return $table;
    }

    public function time_slot(){
        return $this->belongsTo('App\TimeSlot', 'timeSlotID');
    }
}
