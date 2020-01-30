<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $fillable = [
        'userID', 'payMethod', 'payDescription', 'payType', 'amountIN', 'amountOUT', 'ref', 'refID', 'isRefund', 'notes'
    ];
}
