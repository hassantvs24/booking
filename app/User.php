<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'contact', 'userType', 'userRuleID', 'company', 'address', 'photo', 'balance'
    ];


    public function role(){
        return $this->belongsTo('App\UserRules', 'userRuleID');
    }


    public function access($access){
        $is_access = false;

        if($this->userType == 'Super Admin'){
            $is_access = true;
        }else{
            if($this->userRuleID != null){
                $table = UserRules::find($this->userRuleID);
                $is_access = $table->check($access);
            }
        }

        return $is_access;
    }

    public function access_view($access){
        $is_access = 'hidden';

        if($this->userType == 'Super Admin'){
            $is_access = '';
        }else{
            if($this->userRuleID != null){
                $table = UserRules::find($this->userRuleID);
                $c_access = $table->check($access);
                if($c_access){
                    $is_access = '';
                }
            }
        }

        return $is_access;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
