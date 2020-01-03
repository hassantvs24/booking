<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookOption extends Model
{
    protected $table = 'book_option';
    protected $fillable = [
        'bookingID', 'serviceID', 'serviceDate', 'fromTime', 'toTime', 'pricing', 'qty'
    ];
}
