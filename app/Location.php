<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $fillable = [
        'city', 'name', 'address', 'lat', 'lon'
    ];
}
