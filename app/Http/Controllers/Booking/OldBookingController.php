<?php

namespace App\Http\Controllers\Booking;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OldBookingController extends Controller
{
    public function index(){
        $table = Booking::whereIn('status', ['Cancel', 'Complete'])->get();
        return view('booking.old_booking')->with(['table' => $table]);
    }
}
