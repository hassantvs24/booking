<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookOption extends Model
{
    protected $table = 'book_option';
    protected $fillable = [
        'bookingID', 'serviceID', 'serviceDate', 'timeSlotID', 'package', 'pricing', 'qty', 'isComplete'
    ];

    public function service(){
        return $this->belongsTo('App\Services', 'serviceID');
    }

    public function time_slot(){
        return $this->belongsTo('App\TimeSlot', 'timeSlotID');
    }
}
