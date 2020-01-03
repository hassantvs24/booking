<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balance';
    protected $fillable = [
        'userID', 'payMethod', 'payDescription', 'payType', 'amountIN', 'amountOUT', 'notes'
    ];
}