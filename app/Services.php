<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'serviceType', 'name', 'locationID', 'lat', 'lon', 'minGuest', 'maxGuest', 'landmark', 'email', 'website',
        'photos', 'contact', 'pricing', 'facility', 'rules', 'additional', 'social', 'address', 'description', 'rating'
    ];
}
