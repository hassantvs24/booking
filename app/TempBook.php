<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempBook extends Model
{
    protected $table = 'temp_book';
    protected $fillable = [
        'serviceID', 'uniqValue', 'serviceDate', 'timeSlotID', 'package', 'pricing', 'qty'
    ];

    public function services(){
        return $this->belongsTo('App\Services', 'serviceID');
    }

    public function time_slot(){
        return $this->belongsTo('App\TimeSlot', 'timeSlotID');
    }
}
