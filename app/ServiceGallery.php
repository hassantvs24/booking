<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    protected $table = 'service_gallery';
    protected $fillable = [
        'serviceID', 'name', 'photo'
    ];
}
