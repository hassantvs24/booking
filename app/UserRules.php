<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRules extends Model
{
    protected $table = 'user_rules';
    protected $fillable = [
        'name'
    ];

    public function access(){
        return $this->hasMany('App\UserAccess', 'userRuleID');
    }

    public function check($access){
        $table = UserAccess::where('userRuleID', $this->id)->where('access', $access)->count();
        $reslut = false;

        if($table > 0){
            $reslut = true;
        }

        return $reslut;
    }
}
