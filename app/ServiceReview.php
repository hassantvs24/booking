<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceReview extends Model
{
    protected $table = 'service_review';
    protected $fillable = [
        'userID', 'serviceID', 'rating', 'comment'
    ];
}
