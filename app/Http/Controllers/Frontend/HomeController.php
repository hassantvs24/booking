<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Location;
use App\Party;
use App\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        $time_slot = TimeSlot::orderBy('name')->get();
        $party_type = Party::orderBy('name')->get();

        $location = Location::orderBy('id', 'DESC')->get();
        $city = Location::select('city')->orderBy('city', 'ASC')->where('city', '<>', null)->groupBy('city')->get();

        if (!Cookie::get('unique_session')) {
            $random = bcrypt(Str::random(20).date('Y-m-d H:i:s'));
            Cookie::queue('unique_session', $random, 4320);
        }

        return view('frontend.home')->with(['location' => $location, 'city' => $city, 'time_slot' => $time_slot, 'party_type' => $party_type]);
    }

}
