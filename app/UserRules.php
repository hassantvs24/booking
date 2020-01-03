<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRules extends Model
{
    protected $table = 'user_rules';
    protected $fillable = [
        'name'
    ];
}
