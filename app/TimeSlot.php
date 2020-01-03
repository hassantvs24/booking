<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $table = 'time_slot';
    protected $fillable = [
        'timeSlot', 'fromTime', 'toTime'
    ];
}
