<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'serviceType', 'name', 'vendorID', 'locationID', 'lat', 'lon', 'minGuest', 'maxGuest', 'landmark', 'email', 'website',
        'photos', 'contact', 'pricing', 'facility', 'rules', 'additional', 'social', 'address', 'description', 'rating'
    ];

    public function get_facility($id){
        $table = Facility::find($id);

        return ['name' => $table->name,  'icon' => $table->icon];
    }

    public function get_rules($id){
        $table = Rules::find($id);

        return $table->name;
    }

    public function review(){
        return $this->hasMany('App\ServiceReview', 'serviceID');
    }

    public function location(){
        return $this->belongsTo('App\Location', 'locationID');
    }

    public function vendor(){
        return $this->belongsTo('App\User', 'vendorID');
    }
}
